<?php

namespace App\Traits;

use Illuminate\Support\Str;
use App\Models\GoogleTTSSettings;
use App\Models\TextToSpeechSetting;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Google\Cloud\TextToSpeech\V1\AudioConfig;
use Google\Cloud\TextToSpeech\V1\AudioEncoding;
use Google\Cloud\TextToSpeech\V1\SynthesisInput;
use Google\Cloud\TextToSpeech\V1\SsmlVoiceGender;
use Google\Cloud\TextToSpeech\V1\TextToSpeechClient;
use Google\Cloud\TextToSpeech\V1\VoiceSelectionParams;

trait GenerateVoice
{
    #return voice file name, langsAndVoices, path, wordCount
    public function googleVoiceGenerate($voice = 'en-US-News-K', $lang = 'en-US', $pace = 'medium', $break = 1, $speeches = []): array
    {
        $ttsSettings = voiceSettingCredential();
        if (!$ttsSettings) {
            return $data = [];
        }
        $credentials = storage_path($ttsSettings->file_name);
        $client = new TextToSpeechClient([
            'credentials' => $credentials,
            // 'project_id' => 'poised-epigram-392311',
        ]);

        // $speeches = json_decode($speeches, true);

        //Variables and arrays for store
        $wordCount = 0;
        $langsAndVoices = [];
        $speech = [];

        // Convert the text to SSML format

        $ssml = '<speak>';
        foreach ($speeches as $speech) {
            $speech = $speech['content'];
            $ssml .= sprintf(
                '<lang xml:lang="%3$s">
                        <prosody rate="%4$s">
                            <voice name="%1$s">%2$s</voice>
                            <break time="%5$ss"/>
                        </prosody>
                    </lang>',
                $voice,
                $speech,
                $lang,
                $pace,
                $break,
            );

            $langsAndVoices['language'][] = $lang;
            $langsAndVoices['voices'][] = $voice;

            $wordCount += countWords($speech);
        }
        $ssml .= '</speak>';

        // Set the SSML as the synthesis input
        $synthesisInputSsml = (new SynthesisInput())
            ->setSsml($ssml);

        // Build the voice request, select the language code ("en-US") and the ssml voice gender

        $voice = (new VoiceSelectionParams())
            ->setLanguageCode('en-US')
            ->setSsmlGender(SsmlVoiceGender::FEMALE);


        // Effects profile
        // $effectsProfileId = 'telephony-class-application';

        // select the type of audio file you want returned
        $audioConfig = (new AudioConfig())
            ->setAudioEncoding(AudioEncoding::MP3);
        //->setEffectsProfileId(array($effectsProfileId));

        // Perform text-to-speech request on the SSML input with selected voice parameters and audio file type
        $response = $client->synthesizeSpeech($synthesisInputSsml, $voice, $audioConfig);
        $audioContent = $response->getAudioContent();

        $user = auth()->user();

        $audioName = $user->id . '-' . Str::random(20) . '.mp3';

        Storage::disk('audio')->put($audioName, $audioContent);

        $client->close();

        $data = [];
        $data['langsAndVoices'] =  $langsAndVoices;
        $data['audioName'] =  $audioName;
        $data['wordCount'] =  $wordCount;
        $data['file_path'] =  'voice/audio/' . $audioName;
        return $data;
    }
    public function azureVoiceGenerate($voice, $lang = 'en-US', $pace = 'medium', $break = 1, $format = 'mp3', $speeches = []): array
    {
        $data = [];
        $wordCount = 0;
        $langsAndVoices = [];
        $azureKey = voiceSettingCredential()->key;
        $azureRegion = voiceSettingCredential()->region;
        $azureEndpoint = 'https://' . $azureRegion . '.tts.speech.microsoft.com/cognitiveservices/v1';
        // $azureEndpoint = 'https://eastus.api.cognitive.microsoft.com/sts/v1.0/issuetoken';
        # Audio Format

        if ($format == 'mp3') {
            $audio_type = 'audio/mpeg';
        } elseif ($format == 'wav') {
            $audio_type = 'audio/wav';
        } elseif ($format == 'ogg') {
            $audio_type = 'audio/ogg';
        } elseif ($format == 'webm') {
            $audio_type = 'audio/webm';
        }
        # Name and extention of the result audio file
        $name = str_replace(' ', '_', strtolower(auth()->user()->name)) . Str::random(10);

        if ($format === 'mp3') {
            $temp_file_name = $name . '.mp3';
        } elseif ($format === 'ogg') {
            $temp_file_name = $name . '.ogg';
        } elseif ($format === 'webm') {
            $temp_file_name = $name . '.webm';
        } elseif ($format === 'wav') {
            $temp_file_name = $name . '.wav';
        } else {
            $temp_file_name = $name . '.mp3';
        }
        $format = 'mp3';
        $file_name = $temp_file_name;

        if ($format == 'mp3') {
            $output_format = 'audio-24khz-48kbitrate-mono-mp3';
        } elseif ($format == 'ogg') {
            $output_format = 'ogg-24khz-16bit-mono-opus';
        } elseif ($format == 'webm') {
            $output_format = 'webm-24khz-16bit-mono-opus';
        }

        $text = $this->text($speeches);
        $wordCount = strlen($text);

        $text = preg_replace("/\&/", "&amp;", $text);
        $text = preg_replace("/(^|(?<=\s))<((?=\s)|$)/i", "&lt;", $text);
        $text = preg_replace("/(^|(?<=\s))>((?=\s)|$)/i", "&gt;", $text);


        $ssml_text = '<speak version="1.0" xmlns="http://www.w3.org/2001/10/synthesis" xmlns:mstts="http://www.w3.org/2001/mstts" xmlns:emo="http://www.w3.org/2009/10/emotionml" xml:lang="' . $lang . '"><voice name="' . $voice . '">' . $text . '</voice></speak>';

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $azureEndpoint);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Ocp-Apim-Subscription-Key: ' . $azureKey,
            'Content-Type: application/ssml+xml',
            'X-Microsoft-OutputFormat:' . $output_format,
            'User-Agent: Berkine',
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $ssml_text);


        $audio_stream = curl_exec($ch);

        if (curl_errno($ch)) {
            return response()->json(["error" => "Azure Synthesize Error. Please notify support team."], 422);
            Log::error(curl_error($ch) . ' ' . $audio_stream);
        }

        curl_close($ch);

        Storage::disk('audio')->put($file_name, $audio_stream);

        $data['file_path'] = Storage::url($file_name);
        $data['audioName'] = $file_name;
        $data['langsAndVoices'] =  $langsAndVoices;
        $data['wordCount'] =  $wordCount;
        return $data;
    }
    public function text($speeches)
    {
        $text = '';
        foreach ($speeches as $key => $speech) {
            $value = $speech['content'];
            $text .= preg_replace('/<[\s\S]+?>/', '', $value) . '. ';
        }
        return $text;
    }
}
