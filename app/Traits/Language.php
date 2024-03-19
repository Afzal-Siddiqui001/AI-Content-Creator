<?php

namespace App\Traits;

trait Language
{

    public function languageList()
    {
        $languages =
            [
                "af-ZA"     => localize('Afrikaans (South Africa)'),
                "ar-XA"     => localize('Arabic'),
                "eu-ES"     => localize('Basque (Spain)'),
                "bn-IN"     => localize('Bengali (India)'),
                "bg-BG"     => localize('Bulgarian (Bulgaria)'),
                "ca-ES"     => localize('Catalan (Spain) '),
                "yue-HK"    => localize('Chinese (Hong Kong)'),
                "cs-CZ"     => localize('Czech (Czech Republic)'),
                "da-DK"     => localize('Danish (Denmark)'),
                "nl-BE"     => localize('Dutch (Belgium)'),
                "nl-NL"     => localize('Dutch (Netherlands)'),
                "en-AU"     => localize('English (Australia)'),
                "en-IN"     => localize('English (India)'),
                "en-GB"     => localize('English (UK)'),
                "en-US"     => localize('English (US)'),
                "fil-PH"    => localize('Filipino (Philippines)'),
                "fi-FI"     => localize('Finnish (Finland)'),
                "fr-CA"     => localize('French (Canada)'),
                "fr-FR"     => localize('French (France)'),
                "gl-ES"     => localize('Galician (Spain)'),
                "de-DE"     => localize('German (Germany)'),
                "el-GR"     => localize('Greek (Greece)'),
                "gu-IN"     => localize('Gujarati (India)'),
                "he-IL"     => localize('Hebrew (Israel)'),
                "hi-IN"     => localize('Hindi (India)'),
                "hu-HU"     => localize('Hungarian (Hungary)'),
                "is-IS"     => localize('Icelandic (Iceland)'),
                "id-ID"     => localize('Indonesian (Indonesia)'),
                "it-IT"     => localize('Italian (Italy)'),
                "ja-JP"     => localize('Japanese (Japan)'),
                "kn-IN"     => localize('Kannada (India)'),
                "ko-KR"     => localize('Korean (South Korea)'),
                "lv-LV"     => localize('Latvian (Latvia)'),
                "ms-MY"     => localize('Malay (Malaysia)'),
                "ml-IN"     => localize('Malayalam (India)'),
                "cmn-CN"    => localize('Mandarin Chinese'),
                "cmn-TW"    => localize('Mandarin Chinese (T)'),
                "mr-IN"     => localize('Marathi (India)'),
                "nb-NO"     => localize('Norwegian (Norway)'),
                "pl-PL"     => localize('Polish (Poland)'),
                "pt-BR"     => localize('Portuguese (Brazil)'),
                "pt-PT"     => localize('Portuguese (Portugal)'),
                "pa-IN"     => localize('Punjabi (India)'),
                "ro-RO"     => localize('Romanian (Romania)'),
                "ru-RU"     => localize('Russian (Russia)'),
                "sr-RS"     => localize('Serbian (Cyrillic)'),
                "sk-SK"     => localize('Slovak (Slovakia)'),
                "es-ES"     => localize('Spanish (Spain)'),
                "es-US"     => localize('Spanish (US)'),
                "sv-SE"     => localize('Swedish (Sweden)'),
                "ta-IN"     => localize('Tamil (India)'),
                "te-IN"     => localize('Telugu (India)'),
                "th-TH"     => localize('Thai (Thailand)'),
                "tr-TR"     => localize('Turkish (Turkey)'),
                "uk-UA"     => localize('Ukrainian (Ukraine)'),
                "vi-VN"     => localize('Vietnamese (Vietnam)')
            ];
        if (voiceOverEnable() == 'azure') {
            return  $this->azureLanguageList();
        }
        return $languages;
    }
    public function languageVoicesData()
    {
        $voicesData = [
            "af-ZA" => [
                [
                    'value' => "af-ZA-Standard-A",
                    'label' => "Standart - FEMALE"
                ]
            ],
            "ar-XA" => [
                [
                    'value' => "ar-XA-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "ar-XA-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "ar-XA-Standard-C",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "ar-XA-Standard-D",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "ar-XA-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "ar-XA-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "ar-XA-Wavenet-C",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "ar-XA-Wavenet-D",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "eu-ES" => [[
                'value' => "eu-ES-Standard-A",
                'label' => "Standart - FEMALE"
            ]],
            "bn-IN" => [
                [
                    'value' => "bn-IN-Standard-A",
                    'label' => "Standart - FEMALE"
                ],
                [
                    'value' => "bn-IN-Standard-B",
                    'label' => "Standart - MALE"
                ],
                [
                    'value' => "bn-IN-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "bn-IN-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "bg-BG" => [[
                'value' => "bg-BG-Standard-A",
                'label' => "Standart - FEMALE"
            ]],
            "ca-ES" => [[
                'value' => "ca-ES-Standard-A",
                'label' => "Standart - FEMALE"
            ]],
            "yue-HK" => [
                [
                    'value' => "yue-HK-Standard-A",
                    'label' => "Standart - FEMALE"
                ],
                [
                    'value' => "yue-HK-Standard-B",
                    'label' => "Standart - MALE"
                ],
                [
                    'value' => "yue-HK-Standard-C",
                    'label' => "Standart - FEMALE"
                ],
                [
                    'value' => "yue-HK-Standard-D",
                    'label' => "Standart - MALE"
                ]
            ],
            "cs-CZ" => [
                [
                    'value' => "cs-CZ-Standard-A",
                    'label' => "Standart - FEMALE"
                ],
                [
                    'value' => "cs-CZ-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "da-DK" => [

                [
                    'value' => "da-DK-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "da-DK-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "da-DK-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "da-DK-Standard-C",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "da-DK-Standard-D",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "da-DK-Standard-E",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "da-DK-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "da-DK-Wavenet-C",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "da-DK-Wavenet-D",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "da-DK-Wavenet-E",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "nl-BE" => [
                [
                    'value' => "nl-BE-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "nl-BE-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "nl-BE-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "nl-BE-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "nl-NL" => [
                [
                    'value' => "nl-NL-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "nl-NL-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "nl-NL-Standard-C",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "nl-NL-Standard-D",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "nl-NL-Standard-E",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "nl-NL-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "nl-NL-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "nl-NL-Wavenet-C",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "nl-NL-Wavenet-D",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "nl-NL-Wavenet-E",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "en-AU" => [

                [
                    'value' => "en-AU-News-E",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-AU-News-F",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-AU-News-G",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "en-AU-Polyglot-1",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "en-AU-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "en-AU-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "en-AU-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "en-AU-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "en-AU-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-AU-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "en-AU-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-AU-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "en-IN" => [
                [
                    'value' => "en-IN-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "en-IN-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "en-IN-Standard-C",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "en-IN-Standard-D",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "en-IN-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-IN-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "en-IN-Wavenet-C",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "en-IN-Wavenet-D",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "en-GB" => [

                [
                    'value' => "en-GB-News-G",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-GB-News-H",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-GB-News-I",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-GB-News-J",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-GB-News-K",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "en-GB-News-L",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "en-GB-News-M",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "en-GB-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "en-GB-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "en-GB-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "en-GB-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "en-GB-Standard-F",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "en-GB-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-GB-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "en-GB-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-GB-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "en-GB-Wavenet-F",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "en-US" => [

                [
                    'value' => "en-US-News-K",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-US-News-L",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-US-News-M",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "en-US-News-N",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "en-US-Polyglot-1",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "en-US-Standard-A",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "en-US-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "en-US-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "en-US-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "en-US-Standard-E",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "en-US-Standard-F",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "en-US-Standard-G",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "en-US-Standard-H",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "en-US-Standard-I",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "en-US-Standard-J",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "en-US-Studio-M",
                    'label' => "Studio - MALE"
                ],
                [
                    'value' => "en-US-Studio-O",
                    'label' => "Studio - FEMALE"
                ],
                [
                    'value' => "en-US-Wavenet-A",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "en-US-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "en-US-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-US-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "en-US-Wavenet-E",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-US-Wavenet-F",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-US-Wavenet-G",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-US-Wavenet-H",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "en-US-Wavenet-I",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "en-US-Wavenet-J",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "fil-PH" => [
                [
                    'value' => "fil-PH-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "fil-PH-Standard-B",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "fil-PH-Standard-C",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "fil-PH-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "fil-PH-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "fil-PH-Wavenet-B",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "fil-PH-Wavenet-C",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "fil-PH-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ],

            ],
            "fi-FI" => [
                [
                    'value' => "fi-FI-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "fi-FI-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "fr-CA" => [

                [
                    'value' => "fr-CA-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "fr-CA-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "fr-CA-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "fr-CA-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "fr-CA-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "fr-CA-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "fr-CA-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "fr-CA-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "fr-FR" => [

                [
                    'value' => "fr-FR-Polyglot-1",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "fr-FR-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "fr-FR-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "fr-FR-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "fr-FR-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "fr-FR-Standard-E",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "fr-FR-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "fr-FR-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "fr-FR-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "fr-FR-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "fr-FR-Wavenet-E",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "gl-ES" => [[
                'value' => "gl-ES-Standard-A",
                'label' => "Standard - FEMALE"
            ]],
            "de-DE" => [

                [
                    'value' => "de-DE-Polyglot-1",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "de-DE-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "de-DE-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "de-DE-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "de-DE-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "de-DE-Standard-E",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "de-DE-Standard-F",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "de-DE-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "de-DE-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "de-DE-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "de-DE-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "de-DE-Wavenet-E",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "de-DE-Wavenet-F",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "el-GR" => [
                [
                    'value' => "el-GR-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "el-GR-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "gu-IN" => [
                [
                    'value' => "gu-IN-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "gu-IN-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "gu-IN-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "gu-IN-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "he-IL" => [
                [
                    'value' => "he-IL-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "he-IL-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "he-IL-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "he-IL-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "he-IL-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "he-IL-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "he-IL-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "he-IL-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "hi-IN" => [

                [
                    'value' => "hi-IN-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "hi-IN-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "hi-IN-Standard-C",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "hi-IN-Standard-D",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "hi-IN-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "hi-IN-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "hi-IN-Wavenet-C",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "hi-IN-Wavenet-D",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "hu-HU" => [
                [
                    'value' => "hu-HU-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "hu-HU-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "is-IS" => [[
                'value' => "is-IS-Standard-A",
                'label' => "Standard - FEMALE"
            ]],
            "id-ID" => [
                [
                    'value' => "id-ID-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "id-ID-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "id-ID-Standard-C",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "id-ID-Standard-D",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "id-ID-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "id-ID-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "id-ID-Wavenet-C",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "id-ID-Wavenet-D",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "it-IT" => [

                [
                    'value' => "it-IT-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "it-IT-Standard-B",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "it-IT-Standard-C",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "it-IT-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "it-IT-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "it-IT-Wavenet-B",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "it-IT-Wavenet-C",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "it-IT-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "ja-JP" => [

                [
                    'value' => "ja-JP-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "ja-JP-Standard-B",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "ja-JP-Standard-C",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "ja-JP-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "ja-JP-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "ja-JP-Wavenet-B",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "ja-JP-Wavenet-C",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "ja-JP-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "kn-IN" => [
                [
                    'value' => "kn-IN-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "kn-IN-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "kn-IN-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "kn-IN-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "ko-KR" => [

                [
                    'value' => "ko-KR-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "ko-KR-Standard-B",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "ko-KR-Standard-C",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "ko-KR-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "ko-KR-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "ko-KR-Wavenet-B",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "ko-KR-Wavenet-C",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "ko-KR-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "lv-LV" => [[
                'value' => "lv-LV-Standard-A",
                'label' => "Standard - MALE"
            ]],
            "lv-LT" => [[
                'value' => "lv-LT-Standard-A",
                'label' => "Standard - MALE"
            ]],
            "ms-MY" => [
                [
                    'value' => "ms-MY-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "ms-MY-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "ms-MY-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "ms-MY-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "ms-MY-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "ms-MY-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "ms-MY-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "ms-MY-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "ml-IN" => [
                [
                    'value' => "ml-IN-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "ml-IN-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "ml-IN-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "ml-IN-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "ml-IN-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "ml-IN-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "cmn-CN" => [
                [
                    'value' => "cmn-CN-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "cmn-CN-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "cmn-CN-Standard-C",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "cmn-CN-Standard-D",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "cmn-CN-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "cmn-CN-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "cmn-CN-Wavenet-C",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "cmn-CN-Wavenet-D",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "cmn-TW" => [
                [
                    'value' => "cmn-TW-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "cmn-TW-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "cmn-TW-Standard-C",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "cmn-TW-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "cmn-TW-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "cmn-TW-Wavenet-C",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "mr-IN" => [
                [
                    'value' => "mr-IN-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "mr-IN-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "mr-IN-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "mr-IN-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "mr-IN-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "mr-IN-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "nb-NO" => [
                [
                    'value' => "nb-NO-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "nb-NO-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "nb-NO-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "nb-NO-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "nb-NO-Standard-E",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "nb-NO-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "nb-NO-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "nb-NO-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "nb-NO-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "nb-NO-Wavenet-E",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "pl-PL" => [
                [
                    'value' => "pl-PL-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "pl-PL-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "pl-PL-Standard-C",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "pl-PL-Standard-D",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "pl-PL-Standard-E",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "pl-PL-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "pl-PL-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "pl-PL-Wavenet-C",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "pl-PL-Wavenet-D",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "pl-PL-Wavenet-E",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "pt-BR" => [

                [
                    'value' => "pt-BR-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "pt-BR-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "pt-BR-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "pt-BR-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "pt-BR-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "pt-BR-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "pt-PT" => [
                [
                    'value' => "pt-PT-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "pt-PT-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "pt-PT-Standard-C",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "pt-PT-Standard-D",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "pt-PT-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "pt-PT-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "pt-PT-Wavenet-C",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "pt-PT-Wavenet-D",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "pa-IN" => [
                [
                    'value' => "pa-IN-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "pa-IN-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "pa-IN-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "pa-IN-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "pa-IN-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "pa-IN-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "pa-IN-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "pa-IN-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "ro-RO" => [
                [
                    'value' => "ro-RO-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "ro-RO-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "ru-RU" => [
                [
                    'value' => "ru-RU-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "ru-RU-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "ru-RU-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "ru-RU-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "ru-RU-Standard-E",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "ru-RU-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "ru-RU-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "ru-RU-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "ru-RU-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "ru-RU-Wavenet-E",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "sr-RS" => [[
                'value' => "sr-RS-Standard-A",
                'label' => "Standard - FEMALE"
            ]],
            "sk-SK" => [
                [
                    'value' => "sk-SK-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "sk-SK-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "es-ES" => [

                [
                    'value' => "es-ES-Polyglot-1",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "es-ES-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "es-ES-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "es-ES-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "es-ES-Standard-D",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "es-ES-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "es-ES-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "es-ES-Wavenet-D",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "es-US" => [

                [
                    'value' => "es-US-News-D",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "es-US-News-E",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "es-US-News-F",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "es-US-News-G",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "es-US-Polyglot-1",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "es-US-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "es-US-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "es-US-Standard-C",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "es-US-Studio-B",
                    'label' => "Studio - MALE"
                ],
                [
                    'value' => "es-US-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "es-US-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "es-US-Wavenet-C",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "sv-SE" => [
                [
                    'value' => "sv-SE-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "sv-SE-Standard-B",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "sv-SE-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "sv-SE-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "sv-SE-Standard-E",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "sv-SE-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "sv-SE-Wavenet-B",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "sv-SE-Wavenet-C",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "sv-SE-Wavenet-D",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "sv-SE-Wavenet-E",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "ta-IN" => [
                [
                    'value' => "ta-IN-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "ta-IN-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "ta-IN-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "ta-IN-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "ta-IN-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "ta-IN-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "ta-IN-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "ta-IN-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "te-IN" => [
                [
                    'value' => "-IN-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "-IN-Standard-B",
                    'label' => "Standard - MALE"
                ]
            ],
            "th-TH" => [

                [
                    'value' => "th-TH-Standard-A",
                    'label' => "Standard - FEMALE"
                ]
            ],
            "tr-TR" => [
                [
                    'value' => "tr-TR-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "tr-TR-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "tr-TR-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "tr-TR-Standard-D",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "tr-TR-Standard-E",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "tr-TR-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "tr-TR-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "tr-TR-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "tr-TR-Wavenet-D",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "tr-TR-Wavenet-E",
                    'label' => "WaveNet - MALE"
                ]
            ],
            "uk-UA" => [
                [
                    'value' => "uk-UA-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "uk-UA-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ]
            ],
            "vi-VN" => [

                [
                    'value' => "vi-VN-Standard-A",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "vi-VN-Standard-B",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "vi-VN-Standard-C",
                    'label' => "Standard - FEMALE"
                ],
                [
                    'value' => "vi-VN-Standard-D",
                    'label' => "Standard - MALE"
                ],
                [
                    'value' => "vi-VN-Wavenet-A",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "vi-VN-Wavenet-B",
                    'label' => "WaveNet - MALE"
                ],
                [
                    'value' => "vi-VN-Wavenet-C",
                    'label' => "WaveNet - FEMALE"
                ],
                [
                    'value' => "vi-VN-Wavenet-D",
                    'label' => "WaveNet - MALE"
                ]
            ]
        ];
        if (voiceOverEnable() == 'azure') {
            return  $this->azureVoiceDetailList();
        }
        return $voicesData;
    }
    public function azureVoiceDetailList()
    {
        $voices =  array(
            'ar-EG' =>
            array(
                0 =>
                array(
                    'value' => 'ar-EG-SalmaNeural',
                    'label' => 'Rene(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ar-EG-ShakirNeural	',
                    'label' => 'Fae(neural) -Male',
                ),
            ),
            'ar-SA' =>
            array(
                0 =>
                array(
                    'value' => 'ar-SA-ZariyahNeural',
                    'label' => 'Elmo(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ar-SA-HamedNeural',
                    'label' => 'Eldora(neural) -Male',
                ),
            ),
            'bg-BG' =>
            array(
                0 =>
                array(
                    'value' => 'bg-BG-KalinaNeural',
                    'label' => 'Remington(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'bg-BG-BorislavNeural',
                    'label' => 'Delpha(neural) -Male',
                ),
            ),
            'ca-ES' =>
            array(
                0 =>
                array(
                    'value' => 'ca-ES-AlbaNeural',
                    'label' => 'Dedrick(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ca-ES-JoanaNeural',
                    'label' => 'Oral(neural) -Female',
                ),
                2 =>
                array(
                    'value' => 'ca-ES-EnricNeural',
                    'label' => 'Allison(neural) -Male',
                ),
            ),
            'zh-HK' =>
            array(
                0 =>
                array(
                    'value' => 'zh-HK-HiuGaaiNeural',
                    'label' => 'Moises(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'zh-HK-HiuMaanNeural',
                    'label' => 'Wilton(neural) -Female',
                ),
                2 =>
                array(
                    'value' => 'zh-HK-WanLungNeural',
                    'label' => 'Bessie(neural) -Male',
                ),
            ),
            'zh-CN' =>
            array(
                0 =>
                array(
                    'value' => 'zh-CN-XiaoxiaoNeural',
                    'label' => 'Freeman(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'zh-CN-XiaoyouNeural',
                    'label' => 'Uriel(neural) -Female',
                ),
                2 =>
                array(
                    'value' => 'zh-CN-XiaomoNeural',
                    'label' => 'Kaley(neural) -Female',
                ),
                3 =>
                array(
                    'value' => 'zh-CN-XiaoxuanNeural',
                    'label' => 'Sigurd(neural) -Female',
                ),
                4 =>
                array(
                    'value' => 'zh-CN-XiaohanNeural',
                    'label' => 'Jess(neural) -Female',
                ),
                5 =>
                array(
                    'value' => 'zh-CN-XiaoruiNeural',
                    'label' => 'Jettie(neural) -Female',
                ),
                6 =>
                array(
                    'value' => 'zh-CN-YunyangNeural',
                    'label' => 'Velma(neural) -Male',
                ),
                7 =>
                array(
                    'value' => 'zh-CN-YunyeNeural',
                    'label' => 'Norene(neural) -Male',
                ),
                8 =>
                array(
                    'value' => 'zh-CN-YunxiNeural',
                    'label' => 'Suzanne(neural) -Male',
                ),
                9 =>
                array(
                    'value' => 'zh-CN-XiaochenNeural',
                    'label' => 'Gussie(neural) -Female',
                ),
                10 =>
                array(
                    'value' => 'zh-CN-XiaoyanNeural',
                    'label' => 'Zane(neural) -Female',
                ),
                11 =>
                array(
                    'value' => 'zh-CN-XiaoshuangNeural',
                    'label' => 'Valentin(neural) -Female',
                ),
                12 =>
                array(
                    'value' => 'zh-CN-XiaoqiuNeural',
                    'label' => 'Herminio(neural) -Female',
                ),
            ),
            'zh-TW' =>
            array(
                0 =>
                array(
                    'value' => 'zh-TW-HsiaoChenNeural',
                    'label' => 'Wilburn(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'zh-TW-HsiaoYuNeural',
                    'label' => 'Kelton(neural) -Female',
                ),
                2 =>
                array(
                    'value' => 'zh-TW-YunJheNeural',
                    'label' => 'Joannie(neural) -Male',
                ),
            ),
            'hr-HR' =>
            array(
                0 =>
                array(
                    'value' => 'hr-HR-GabrijelaNeural',
                    'label' => 'Emerald(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'hr-HR-SreckoNeural',
                    'label' => 'Chloe(neural) -Male',
                ),
            ),
            'cs-CZ' =>
            array(
                0 =>
                array(
                    'value' => 'cs-CZ-VlastaNeural',
                    'label' => 'Carlo(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'cs-CZ-AntoninNeural',
                    'label' => 'Carley(neural) -Male',
                ),
            ),
            'da-DK' =>
            array(
                0 =>
                array(
                    'value' => 'da-DK-ChristelNeural',
                    'label' => 'Cristina(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'da-DK-JeppeNeural',
                    'label' => 'Arlie(neural) -Male',
                ),
            ),
            'nl-BE' =>
            array(
                0 =>
                array(
                    'value' => 'nl-BE-DenaNeural',
                    'label' => 'Mustafa(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'nl-BE-ArnaudNeural',
                    'label' => 'Kelsi(neural) -Male',
                ),
            ),
            'nl-NL' =>
            array(
                0 =>
                array(
                    'value' => 'nl-NL-ColetteNeural',
                    'label' => 'Waldo(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'nl-NL-FennaNeural',
                    'label' => 'Emery(neural) -Female',
                ),
                2 =>
                array(
                    'value' => 'nl-NL-MaartenNeural',
                    'label' => 'Amiya(neural) -Male',
                ),
            ),
            'en-AU' =>
            array(
                0 =>
                array(
                    'value' => 'en-AU-NatashaNeural',
                    'label' => 'Buford(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'en-AU-WilliamNeural',
                    'label' => 'Dayna(neural) -Male',
                ),
            ),
            'en-CA' =>
            array(
                0 =>
                array(
                    'value' => 'en-CA-ClaraNeural',
                    'label' => 'King(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'en-CA-LiamNeural',
                    'label' => 'Mariela(neural) -Male',
                ),
            ),
            'en-HK' =>
            array(
                0 =>
                array(
                    'value' => 'en-HK-YanNeural',
                    'label' => 'Devante(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'en-HK-SamNeural',
                    'label' => 'Mafalda(neural) -Male',
                ),
            ),
            'en-IN' =>
            array(
                0 =>
                array(
                    'value' => 'en-IN-NeerjaNeural',
                    'label' => 'Dudley(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'en-IN-PrabhatNeural',
                    'label' => 'Heloise(neural) -Male',
                ),
            ),
            'en-IE' =>
            array(
                0 =>
                array(
                    'value' => 'en-IE-EmilyNeural',
                    'label' => 'Avery(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'en-IE-ConnorNeural',
                    'label' => 'Pearlie(neural) -Male',
                ),
            ),
            'en-NZ' =>
            array(
                0 =>
                array(
                    'value' => 'en-NZ-MollyNeural',
                    'label' => 'Demond(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'en-NZ-MitchellNeural',
                    'label' => 'Ashtyn(neural) -Male',
                ),
            ),
            'en-PH' =>
            array(
                0 =>
                array(
                    'value' => 'en-PH-RosaNeural',
                    'label' => 'Elliott(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'en-PH-JamesNeural',
                    'label' => 'Kimberly(neural) -Male',
                ),
            ),
            'en-SG' =>
            array(
                0 =>
                array(
                    'value' => 'en-SG-LunaNeural',
                    'label' => 'Eli(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'en-SG-WayneNeural',
                    'label' => 'Alysa(neural) -Male',
                ),
            ),
            'en-ZA' =>
            array(
                0 =>
                array(
                    'value' => 'en-ZA-LeahNeural',
                    'label' => 'Matt(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'en-ZA-LukeNeural',
                    'label' => 'Vincenza(neural) -Male',
                ),
            ),
            'en-GB' =>
            array(
                0 =>
                array(
                    'value' => 'en-GB-LibbyNeural',
                    'label' => 'Allen(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'en-GB-RyanNeural',
                    'label' => 'Linda(neural) -Male',
                ),
                2 =>
                array(
                    'value' => 'en-GB-SoniaNeural',
                    'label' => 'Greg(neural) -Female',
                ),
                3 =>
                array(
                    'value' => 'en-GB-AbbiNeural',
                    'label' => 'Emmet(neural) -Female',
                ),
                4 =>
                array(
                    'value' => 'en-GB-BellaNeural',
                    'label' => 'Orrin(neural) -Female',
                ),
                5 =>
                array(
                    'value' => 'en-GB-HollieNeural',
                    'label' => 'Evans(neural) -Female',
                ),
                6 =>
                array(
                    'value' => 'en-GB-OliviaNeural',
                    'label' => 'Ryley(neural) -Female',
                ),
                7 =>
                array(
                    'value' => 'en-GB-MaisieNeural',
                    'label' => 'Burdette(neural) -Female(child)',
                ),
                8 =>
                array(
                    'value' => 'en-GB-AlfieNeural',
                    'label' => 'Adrianna(neural) -Male',
                ),
                9 =>
                array(
                    'value' => 'en-GB-ElliotNeural',
                    'label' => 'Else(neural) -Male',
                ),
                10 =>
                array(
                    'value' => 'en-GB-EthanNeural',
                    'label' => 'Lulu(neural) -Male',
                ),
                11 =>
                array(
                    'value' => 'en-GB-NoahNeural',
                    'label' => 'Amiya(neural) -Male',
                ),
                12 =>
                array(
                    'value' => 'en-GB-OliverNeural',
                    'label' => 'Dayana(neural) -Male',
                ),
                13 =>
                array(
                    'value' => 'en-GB-ThomasNeural',
                    'label' => 'Ivy(neural) -Male',
                ),
            ),
            'en-US' =>
            array(
                0 =>
                array(
                    'value' => 'en-US-AriaNeural',
                    'label' => 'Leonardo(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'en-US-JennyNeural',
                    'label' => 'Eli(neural) -Female',
                ),
                2 =>
                array(
                    'value' => 'en-US-GuyNeural',
                    'label' => 'Ivah(neural) -Male',
                ),
                3 =>
                array(
                    'value' => 'en-US-AmberNeural',
                    'label' => 'Coby(neural) -Female',
                ),
                4 =>
                array(
                    'value' => 'en-US-AshleyNeural',
                    'label' => 'Vito(neural) -Female',
                ),
                5 =>
                array(
                    'value' => 'en-US-CoraNeural',
                    'label' => 'Keeley(neural) -Female',
                ),
                6 =>
                array(
                    'value' => 'en-US-ElizabethNeural',
                    'label' => 'Alexie(neural) -Female',
                ),
                7 =>
                array(
                    'value' => 'en-US-MichelleNeural',
                    'label' => 'Geo(neural) -Female',
                ),
                8 =>
                array(
                    'value' => 'en-US-MonicaNeural',
                    'label' => 'Hayden(neural) -Female',
                ),
                9 =>
                array(
                    'value' => 'en-US-SaraNeural',
                    'label' => 'Alberto(neural) -Female',
                ),
                10 =>
                array(
                    'value' => 'en-US-AnaNeural',
                    'label' => 'Celestine(neural) -Female(child)',
                ),
                11 =>
                array(
                    'value' => 'en-US-BrandonNeural',
                    'label' => 'Rosetta(neural) -Male',
                ),
                12 =>
                array(
                    'value' => 'en-US-ChristopherNeural',
                    'label' => 'Shakira(neural) -Male',
                ),
                13 =>
                array(
                    'value' => 'en-US-EricNeural',
                    'label' => 'Dawn(neural) -Male',
                ),
                14 =>
                array(
                    'value' => 'en-US-JacobNeural',
                    'label' => 'Leanne(neural) -Male',
                ),
            ),
            'et-EE' =>
            array(
                0 =>
                array(
                    'value' => 'et-EE-AnuNeural',
                    'label' => 'Wilber(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'et-EE-KertNeural',
                    'label' => 'Gloria(neural) -Male',
                ),
            ),
            'fi-FI' =>
            array(
                0 =>
                array(
                    'value' => 'fi-FI-NooraNeural',
                    'label' => 'Toni(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'fi-FI-SelmaNeural',
                    'label' => 'Stephen(neural) -Female',
                ),
                2 =>
                array(
                    'value' => 'fi-FI-HarriNeural',
                    'label' => 'Candice(neural) -Male',
                ),
            ),
            'fr-BE' =>
            array(
                0 =>
                array(
                    'value' => 'fr-BE-CharlineNeural',
                    'label' => 'Stefan(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'fr-BE-GerardNeural',
                    'label' => 'Kenya(neural) -Male',
                ),
            ),
            'fr-CA' =>
            array(
                0 =>
                array(
                    'value' => 'fr-CA-SylvieNeural',
                    'label' => 'Emmanuel(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'fr-CA-AntoineNeural',
                    'label' => 'Alberta(neural) -Male',
                ),
                2 =>
                array(
                    'value' => 'fr-CA-JeanNeural',
                    'label' => 'Anabelle(neural) -Male',
                ),
            ),
            'fr-FR' =>
            array(
                0 =>
                array(
                    'value' => 'fr-FR-DeniseNeural',
                    'label' => 'Kadin(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'fr-FR-HenriNeural',
                    'label' => 'Noelia(neural) -Male',
                ),
                2 =>
                array(
                    'value' => 'fr-FR-BrigitteNeural',
                    'label' => 'Lambert(neural) -Female',
                ),
                3 =>
                array(
                    'value' => 'fr-FR-CelesteNeural',
                    'label' => 'Antone(neural) -Female',
                ),
                4 =>
                array(
                    'value' => 'fr-FR-CoralieNeural',
                    'label' => 'Mervin(neural) -Female',
                ),
                5 =>
                array(
                    'value' => 'fr-FR-JacquelineNeural',
                    'label' => 'Brook(neural) -Female',
                ),
                6 =>
                array(
                    'value' => 'fr-FR-JosephineNeural',
                    'label' => 'Norbert(neural) -Female',
                ),
                7 =>
                array(
                    'value' => 'fr-FR-YvetteNeural',
                    'label' => 'Roosevelt(neural) -Female',
                ),
                8 =>
                array(
                    'value' => 'fr-FR-EloiseNeural',
                    'label' => 'Deanna(neural) -Female(child)',
                ),
                9 =>
                array(
                    'value' => 'fr-FR-AlainNeural',
                    'label' => 'Mireille(neural) -Male',
                ),
                10 =>
                array(
                    'value' => 'fr-FR-ClaudeNeural',
                    'label' => 'Willow(neural) -Male',
                ),
                11 =>
                array(
                    'value' => 'fr-FR-JeromeNeural',
                    'label' => 'Liliane(neural) -Male',
                ),
                12 =>
                array(
                    'value' => 'fr-FR-MauriceNeural',
                    'label' => 'Mazie(neural) -Male',
                ),
                13 =>
                array(
                    'value' => 'fr-FR-YvesNeural',
                    'label' => 'Otilia(neural) -Male',
                ),
            ),
            'fr-CH' =>
            array(
                0 =>
                array(
                    'value' => 'fr-CH-ArianeNeural',
                    'label' => 'Jamel(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'fr-CH-FabriceNeural',
                    'label' => 'Myrtis(neural) -Male',
                ),
            ),
            'de-AT' =>
            array(
                0 =>
                array(
                    'value' => 'de-AT-IngridNeural',
                    'label' => 'Dennis(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'de-AT-JonasNeural',
                    'label' => 'Felicity(neural) -Male',
                ),
            ),
            'de-DE' =>
            array(
                0 =>
                array(
                    'value' => 'de-DE-KatjaNeural',
                    'label' => 'Domenic(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'de-DE-ConradNeural',
                    'label' => 'Freda(neural) -Male',
                ),
                2 =>
                array(
                    'value' => 'de-DE-AmalaNeural',
                    'label' => 'Gus(neural) -Female',
                ),
                3 =>
                array(
                    'value' => 'de-DE-ElkeNeural',
                    'label' => 'Hilbert(neural) -Female',
                ),
                4 =>
                array(
                    'value' => 'de-DE-KlarissaNeural',
                    'label' => 'Kamron(neural) -Female',
                ),
                5 =>
                array(
                    'value' => 'de-DE-LouisaNeural',
                    'label' => 'Giovanni(neural) -Female',
                ),
                6 =>
                array(
                    'value' => 'de-DE-MajaNeural',
                    'label' => 'Peter(neural) -Female',
                ),
                7 =>
                array(
                    'value' => 'de-DE-TanjaNeural',
                    'label' => 'Charley(neural) -Female',
                ),
                8 =>
                array(
                    'value' => 'de-DE-GiselaNeural',
                    'label' => 'Cayla(neural) -Female(child)',
                ),
                9 =>
                array(
                    'value' => 'de-DE-BerndNeural',
                    'label' => 'Mariane(neural) -Male',
                ),
                10 =>
                array(
                    'value' => 'de-DE-ChristophNeural',
                    'label' => 'Lorna(neural) -Male',
                ),
                11 =>
                array(
                    'value' => 'de-DE-KasperNeural',
                    'label' => 'Audreanne(neural) -Male',
                ),
                12 =>
                array(
                    'value' => 'de-DE-KillianNeural',
                    'label' => 'Carlee(neural) -Male',
                ),
                13 =>
                array(
                    'value' => 'de-DE-KlausNeural',
                    'label' => 'Noemi(neural) -Male',
                ),
                14 =>
                array(
                    'value' => 'de-DE-RalfNeural',
                    'label' => 'Marguerite(neural) -Male',
                ),
            ),
            'de-CH' =>
            array(
                0 =>
                array(
                    'value' => 'de-CH-LeniNeural',
                    'label' => 'Richie(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'de-CH-JanNeural',
                    'label' => 'Chanelle(neural) -Male',
                ),
            ),
            'el-GR' =>
            array(
                0 =>
                array(
                    'value' => 'el-GR-AthinaNeural',
                    'label' => 'Heber(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'el-GR-NestorasNeural',
                    'label' => 'Nyah(neural) -Male',
                ),
            ),
            'gu-IN' =>
            array(
                0 =>
                array(
                    'value' => 'gu-IN-DhwaniNeural',
                    'label' => 'Ford(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'gu-IN-NiranjanNeural',
                    'label' => 'Carolina(neural) -Male',
                ),
            ),
            'he-IL' =>
            array(
                0 =>
                array(
                    'value' => 'he-IL-HilaNeural',
                    'label' => 'Larry(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'he-IL-AvriNeural',
                    'label' => 'Willie(neural) -Male',
                ),
            ),
            'hi-IN' =>
            array(
                0 =>
                array(
                    'value' => 'hi-IN-SwaraNeural',
                    'label' => 'Seamus(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'hi-IN-MadhurNeural',
                    'label' => 'Marlen(neural) -Male',
                ),
            ),
            'hu-HU' =>
            array(
                0 =>
                array(
                    'value' => 'hu-HU-NoemiNeural',
                    'label' => 'Travon(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'hu-HU-TamasNeural',
                    'label' => 'Destiny(neural) -Male',
                ),
            ),
            'id-ID' =>
            array(
                0 =>
                array(
                    'value' => 'id-ID-GadisNeural',
                    'label' => 'Kristian(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'id-ID-ArdiNeural',
                    'label' => 'Laurianne(neural) -Male',
                ),
            ),
            'ga-IE' =>
            array(
                0 =>
                array(
                    'value' => 'ga-IE-OrlaNeural',
                    'label' => 'Clair(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ga-IE-ColmNeural',
                    'label' => 'Aryanna(neural) -Male',
                ),
            ),
            'it-IT' =>
            array(
                0 =>
                array(
                    'value' => 'it-IT-ElsaNeural',
                    'label' => 'Jaylen(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'it-IT-IsabellaNeural',
                    'label' => 'Elton(neural) -Female',
                ),
                2 =>
                array(
                    'value' => 'it-IT-DiegoNeural',
                    'label' => 'Lacy(neural) -Male',
                ),
                3 =>
                array(
                    'value' => 'it-IT-PierinaNeural',
                    'label' => 'Fernando(neural) -Female',
                ),
                4 =>
                array(
                    'value' => 'it-IT-FabiolaNeural',
                    'label' => 'Gaston(neural) -Female',
                ),
                5 =>
                array(
                    'value' => 'it-IT-ImeldaNeural',
                    'label' => 'Dante(neural) -Female',
                ),
                6 =>
                array(
                    'value' => 'it-IT-PalmiraNeural',
                    'label' => 'Oscar(neural) -Female',
                ),
                7 =>
                array(
                    'value' => 'it-IT-FiammaNeural',
                    'label' => 'Samir(neural) -Female',
                ),
                8 =>
                array(
                    'value' => 'it-IT-IrmaNeural',
                    'label' => 'Gregory(neural) -Female',
                ),
                9 =>
                array(
                    'value' => 'it-IT-BenignoNeural',
                    'label' => 'Ivah(neural) -Male',
                ),
                10 =>
                array(
                    'value' => 'it-IT-CataldoNeural',
                    'label' => 'Dolly(neural) -Male',
                ),
                11 =>
                array(
                    'value' => 'it-IT-LisandroNeural',
                    'label' => 'Bianka(neural) -Male',
                ),
                12 =>
                array(
                    'value' => 'it-IT-GianniNeural',
                    'label' => 'Krystal(neural) -Male',
                ),
                13 =>
                array(
                    'value' => 'it-IT-CalimeroNeural',
                    'label' => 'Patience(neural) -Male',
                ),
                14 =>
                array(
                    'value' => 'it-IT-RinaldoNeural',
                    'label' => 'Verlie(neural) -Male',
                ),
            ),
            'ja-JP' =>
            array(
                0 =>
                array(
                    'value' => 'ja-JP-NanamiNeural',
                    'label' => 'Frank(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ja-JP-KeitaNeural',
                    'label' => 'Antonietta(neural) -Male',
                ),
            ),
            'ko-KR' =>
            array(
                0 =>
                array(
                    'value' => 'ko-KR-SunHiNeural',
                    'label' => 'Isaac(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ko-KR-InJoonNeural',
                    'label' => 'Sarina(neural) -Male',
                ),
            ),
            'lv-LV' =>
            array(
                0 =>
                array(
                    'value' => 'lv-LV-EveritaNeural',
                    'label' => 'Kennedy(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'lv-LV-NilsNeural',
                    'label' => 'Angelica(neural) -Male',
                ),
            ),
            'lt-LT' =>
            array(
                0 =>
                array(
                    'value' => 'lt-LT-OnaNeural',
                    'label' => 'Raven(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'lt-LT-LeonasNeural',
                    'label' => 'Carmela(neural) -Male',
                ),
            ),
            'ms-MY' =>
            array(
                0 =>
                array(
                    'value' => 'ms-MY-YasminNeural',
                    'label' => 'Erin(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ms-MY-OsmanNeural',
                    'label' => 'Marian(neural) -Male',
                ),
            ),
            'mt-MT' =>
            array(
                0 =>
                array(
                    'value' => 'mt-MT-GraceNeural',
                    'label' => 'Boyd(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'mt-MT-JosephNeural',
                    'label' => 'Idell(neural) -Male',
                ),
            ),
            'mr-IN' =>
            array(
                0 =>
                array(
                    'value' => 'mr-IN-AarohiNeural',
                    'label' => 'Felipe(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'mr-IN-ManoharNeural',
                    'label' => 'Lilyan(neural) -Male',
                ),
            ),
            'nb-NO' =>
            array(
                0 =>
                array(
                    'value' => 'nb-NO-IselinNeural',
                    'label' => 'Buford(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'nb-NO-PernilleNeural',
                    'label' => 'Cortez(neural) -Female',
                ),
                2 =>
                array(
                    'value' => 'nb-NO-FinnNeural',
                    'label' => 'Theresia(neural) -Male',
                ),
            ),
            'pl-PL' =>
            array(
                0 =>
                array(
                    'value' => 'pl-PL-AgnieszkaNeural',
                    'label' => 'Louie(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'pl-PL-ZofiaNeural',
                    'label' => 'Hiram(neural) -Female',
                ),
                2 =>
                array(
                    'value' => 'pl-PL-MarekNeural',
                    'label' => 'Clemmie(neural) -Male',
                ),
            ),
            'pt-BR' =>
            array(
                0 =>
                array(
                    'value' => 'pt-BR-FranciscaNeural',
                    'label' => 'Jocelyn(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'pt-BR-AntonioNeural',
                    'label' => 'Eliza(neural) -Male',
                ),
                2 =>
                array(
                    'value' => 'pt-BR-DonatoNeural',
                    'label' => 'Raegan(neural) -Male',
                ),
                3 =>
                array(
                    'value' => 'pt-BR-FabioNeural',
                    'label' => 'Allene(neural) -Male',
                ),
                4 =>
                array(
                    'value' => 'pt-BR-JulioNeural',
                    'label' => 'Kenna(neural) -Male',
                ),
                5 =>
                array(
                    'value' => 'pt-BR-NicolauNeural',
                    'label' => 'Rhea(neural) -Male',
                ),
                6 =>
                array(
                    'value' => 'pt-BR-ValerioNeural',
                    'label' => 'Destiny(neural) -Male',
                ),
                7 =>
                array(
                    'value' => 'pt-BR-LeticiaNeural',
                    'label' => 'Kole(neural) -Female',
                ),
                8 =>
                array(
                    'value' => 'pt-BR-BrendaNeural',
                    'label' => 'Vern(neural) -Female',
                ),
                9 =>
                array(
                    'value' => 'pt-BR-ElzaNeural',
                    'label' => 'Louisa(neural) -Female',
                ),
                10 =>
                array(
                    'value' => 'pt-BR-ManuelaNeural',
                    'label' => 'Manuel(neural) -Female',
                ),
                11 =>
                array(
                    'value' => 'pt-BR-GiovannaNeural',
                    'label' => 'Leopoldo(neural) -Female',
                ),
                12 =>
                array(
                    'value' => 'pt-BR-LeilaNeural',
                    'label' => 'Winfield(neural) -Female',
                ),
                13 =>
                array(
                    'value' => 'pt-BR-YaraNeural',
                    'label' => 'Zander(neural) -Female',
                ),
                14 =>
                array(
                    'value' => 'pt-BR-HumbertoNeural',
                    'label' => 'Martina(neural) -Male',
                ),
            ),
            'pt-PT' =>
            array(
                0 =>
                array(
                    'value' => 'pt-PT-FernandaNeural',
                    'label' => 'Victor(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'pt-PT-RaquelNeural',
                    'label' => 'Demetrius(neural) -Female',
                ),
                2 =>
                array(
                    'value' => 'pt-PT-DuarteNeural',
                    'label' => 'Eulah(neural) -Male',
                ),
            ),
            'ro-RO' =>
            array(
                0 =>
                array(
                    'value' => 'ro-RO-AlinaNeural',
                    'label' => 'Will(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ro-RO-EmilNeural',
                    'label' => 'Jordane(neural) -Male',
                ),
            ),
            'ru-RU' =>
            array(
                0 =>
                array(
                    'value' => 'ru-RU-DariyaNeural',
                    'label' => 'Alexzander(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ru-RU-SvetlanaNeural',
                    'label' => 'Jasen(neural) -Female',
                ),
                2 =>
                array(
                    'value' => 'ru-RU-DmitryNeural',
                    'label' => 'Yvette(neural) -Male',
                ),
            ),
            'sk-SK' =>
            array(
                0 =>
                array(
                    'value' => 'sk-SK-ViktoriaNeural',
                    'label' => 'Darrick(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'sk-SK-LukasNeural',
                    'label' => 'Shanelle(neural) -Male',
                ),
            ),
            'sl-SI' =>
            array(
                0 =>
                array(
                    'value' => 'sl-SI-PetraNeural',
                    'label' => 'Michale(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'sl-SI-RokNeural',
                    'label' => 'Jermaine(neural) -Male',
                ),
            ),
            'es-AR' =>
            array(
                0 =>
                array(
                    'value' => 'es-AR-ElenaNeural',
                    'label' => 'Kenny(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-AR-TomasNeural',
                    'label' => 'Berenice(neural) -Male',
                ),
            ),
            'es-CO' =>
            array(
                0 =>
                array(
                    'value' => 'es-CO-SalomeNeural',
                    'label' => 'Irwin(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-CO-GonzaloNeural',
                    'label' => 'Carolanne(neural) -Male',
                ),
            ),
            'es-MX' =>
            array(
                0 =>
                array(
                    'value' => 'es-MX-DaliaNeural',
                    'label' => 'Jonas(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-MX-JorgeNeural',
                    'label' => 'Felicia(neural) -Male',
                ),
                2 =>
                array(
                    'value' => 'es-MX-CecilioNeural',
                    'label' => 'Virginia(neural) -Male',
                ),
                3 =>
                array(
                    'value' => 'es-MX-GerardoNeural',
                    'label' => 'Valentina(neural) -Male',
                ),
                4 =>
                array(
                    'value' => 'es-MX-LibertoNeural',
                    'label' => 'Lynn(neural) -Male',
                ),
                5 =>
                array(
                    'value' => 'es-MX-LucianoNeural',
                    'label' => 'Nina(neural) -Male',
                ),
                6 =>
                array(
                    'value' => 'es-MX-PelayoNeural',
                    'label' => 'Christine(neural) -Male',
                ),
                7 =>
                array(
                    'value' => 'es-MX-YagoNeural',
                    'label' => 'Cathrine(neural) -Male',
                ),
                8 =>
                array(
                    'value' => 'es-MX-BeatrizNeural',
                    'label' => 'Paul(neural) -Female',
                ),
                9 =>
                array(
                    'value' => 'es-MX-CarlotaNeural',
                    'label' => 'Trevor(neural) -Female',
                ),
                10 =>
                array(
                    'value' => 'es-MX-NuriaNeural',
                    'label' => 'Johnpaul(neural) -Female',
                ),
                11 =>
                array(
                    'value' => 'es-MX-CandelaNeural',
                    'label' => 'Gerhard(neural) -Female',
                ),
                12 =>
                array(
                    'value' => 'es-MX-LarissaNeural',
                    'label' => 'Ned(neural) -Female',
                ),
                13 =>
                array(
                    'value' => 'es-MX-RenataNeural',
                    'label' => 'Cornell(neural) -Female',
                ),
                14 =>
                array(
                    'value' => 'es-MX-MarinaNeural',
                    'label' => 'Frankie(neural) -Female',
                ),
            ),
            'es-ES' =>
            array(
                0 =>
                array(
                    'value' => 'es-ES-ElviraNeural',
                    'label' => 'Lowell(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-ES-AlvaroNeural',
                    'label' => 'Bettye(neural) -Male',
                ),
            ),
            'es-US' =>
            array(
                0 =>
                array(
                    'value' => 'es-US-PalomaNeural',
                    'label' => 'Jessie(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-US-AlonsoNeural',
                    'label' => 'Natasha(neural) -Male',
                ),
            ),
            'sw-KE' =>
            array(
                0 =>
                array(
                    'value' => 'sw-KE-ZuriNeural',
                    'label' => 'Hester(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'sw-KE-RafikiNeural',
                    'label' => 'Rosemary(neural) -Male',
                ),
            ),
            'sv-SE' =>
            array(
                0 =>
                array(
                    'value' => 'sv-SE-HilleviNeural',
                    'label' => 'Carson(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'sv-SE-SofieNeural',
                    'label' => 'Oral(neural) -Female',
                ),
                2 =>
                array(
                    'value' => 'sv-SE-MattiasNeural',
                    'label' => 'Shirley(neural) -Male',
                ),
            ),
            'ta-IN' =>
            array(
                0 =>
                array(
                    'value' => 'ta-IN-PallaviNeural',
                    'label' => 'Shawn(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ta-IN-ValluvarNeural',
                    'label' => 'Noemie(neural) -Male',
                ),
            ),
            'te-IN' =>
            array(
                0 =>
                array(
                    'value' => 'te-IN-ShrutiNeural',
                    'label' => 'Floy(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'te-IN-MohanNeural',
                    'label' => 'Ima(neural) -Male',
                ),
            ),
            'th-TH' =>
            array(
                0 =>
                array(
                    'value' => 'th-TH-AcharaNeural',
                    'label' => 'Declan(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'th-TH-PremwadeeNeural',
                    'label' => 'Ernie(neural) -Female',
                ),
                2 =>
                array(
                    'value' => 'th-TH-NiwatNeural',
                    'label' => 'Delfina(neural) -Male',
                ),
            ),
            'tr-TR' =>
            array(
                0 =>
                array(
                    'value' => 'tr-TR-EmelNeural',
                    'label' => 'Gardner(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'tr-TR-AhmetNeural',
                    'label' => 'Vallie(neural) -Male',
                ),
            ),
            'uk-UA' =>
            array(
                0 =>
                array(
                    'value' => 'uk-UA-PolinaNeural',
                    'label' => 'Lavern(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'uk-UA-OstapNeural',
                    'label' => 'Rebekah(neural) -Male',
                ),
            ),
            'ur-PK' =>
            array(
                0 =>
                array(
                    'value' => 'ur-PK-UzmaNeural',
                    'label' => 'Davion(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ur-PK-AsadNeural',
                    'label' => 'Christa(neural) -Male',
                ),
            ),
            'vi-VN' =>
            array(
                0 =>
                array(
                    'value' => 'vi-VN-HoaiMyNeural',
                    'label' => 'Presley(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'vi-VN-NamMinhNeural',
                    'label' => 'Lydia(neural) -Male',
                ),
            ),
            'cy-GB' =>
            array(
                0 =>
                array(
                    'value' => 'cy-GB-NiaNeural',
                    'label' => 'Lew(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'cy-GB-AledNeural',
                    'label' => 'Guiseppe(neural) -Female',
                ),
            ),
            'af-ZA' =>
            array(
                0 =>
                array(
                    'value' => 'af-ZA-AdriNeural',
                    'label' => 'Ezekiel(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'af-ZA-WillemNeural',
                    'label' => 'Antonette(neural) -Male',
                ),
            ),
            'am-ET' =>
            array(
                0 =>
                array(
                    'value' => 'am-ET-MekdesNeural',
                    'label' => 'Deon(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'am-ET-AmehaNeural',
                    'label' => 'Neoma(neural) -Male',
                ),
            ),
            'ar-DZ' =>
            array(
                0 =>
                array(
                    'value' => 'ar-DZ-AminaNeural',
                    'label' => 'Ismael(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ar-DZ-IsmaelNeural',
                    'label' => 'Mossie(neural) -Male',
                ),
            ),
            'ar-BH' =>
            array(
                0 =>
                array(
                    'value' => 'ar-BH-LailaNeural',
                    'label' => 'Toby(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ar-BH-AliNeural',
                    'label' => 'Annamae(neural) -Male',
                ),
            ),
            'ar-IQ' =>
            array(
                0 =>
                array(
                    'value' => 'ar-IQ-RanaNeural',
                    'label' => 'Erling(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ar-IQ-BasselNeural',
                    'label' => 'Addie(neural) -Male',
                ),
            ),
            'ar-JO' =>
            array(
                0 =>
                array(
                    'value' => 'ar-JO-SanaNeural',
                    'label' => 'Nash(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ar-JO-TaimNeural',
                    'label' => 'Eunice(neural) -Male',
                ),
            ),
            'ar-KW' =>
            array(
                0 =>
                array(
                    'value' => 'ar-KW-NouraNeural',
                    'label' => 'Sidney(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ar-KW-FahedNeural',
                    'label' => 'Viviane(neural) -Male',
                ),
            ),
            'ar-LY' =>
            array(
                0 =>
                array(
                    'value' => 'ar-LY-ImanNeural',
                    'label' => 'Gianni(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ar-LY-OmarNeural',
                    'label' => 'Linnie(neural) -Male',
                ),
            ),
            'ar-MA' =>
            array(
                0 =>
                array(
                    'value' => 'ar-MA-MounaNeural',
                    'label' => 'Candido(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ar-MA-JamalNeural',
                    'label' => 'Jessyca(neural) -Male',
                ),
            ),
            'ar-QA' =>
            array(
                0 =>
                array(
                    'value' => 'ar-QA-AmalNeural',
                    'label' => 'Rhiannon(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ar-QA-MoazNeural',
                    'label' => 'Eliane(neural) -Male',
                ),
            ),
            'ar-SY' =>
            array(
                0 =>
                array(
                    'value' => 'ar-SY-AmanyNeural',
                    'label' => 'Donnie(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ar-SY-LaithNeural',
                    'label' => 'Norma(neural) -Male',
                ),
            ),
            'ar-TN' =>
            array(
                0 =>
                array(
                    'value' => 'ar-TN-ReemNeural',
                    'label' => 'Rey(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ar-TN-HediNeural',
                    'label' => 'Danyka(neural) -Male',
                ),
            ),
            'ar-AE' =>
            array(
                0 =>
                array(
                    'value' => 'ar-AE-FatimaNeural',
                    'label' => 'Ryleigh(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ar-AE-HamdanNeural',
                    'label' => 'Constance(neural) -Male',
                ),
            ),
            'ar-YE' =>
            array(
                0 =>
                array(
                    'value' => 'ar-YE-MaryamNeural',
                    'label' => 'Jerry(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ar-YE-SalehNeural',
                    'label' => 'Henriette(neural) -Male',
                ),
            ),
            'bn-BD' =>
            array(
                0 =>
                array(
                    'value' => 'bn-BD-NabanitaNeural',
                    'label' => 'Aric(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'bn-BD-PradeepNeural',
                    'label' => 'Angelina(neural) -Male',
                ),
            ),
            'my-MM' =>
            array(
                0 =>
                array(
                    'value' => 'my-MM-NilarNeural',
                    'label' => 'Jasmin(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'my-MM-ThihaNeural',
                    'label' => 'Kathryn(neural) -Male',
                ),
            ),
            'en-KE' =>
            array(
                0 =>
                array(
                    'value' => 'en-KE-AsiliaNeural',
                    'label' => 'Zack(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'en-KE-ChilembaNeural',
                    'label' => 'Lilla(neural) -Male',
                ),
            ),
            'en-NG' =>
            array(
                0 =>
                array(
                    'value' => 'en-NG-EzinneNeural',
                    'label' => 'Jules(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'en-NG-AbeoNeural',
                    'label' => 'Meggie(neural) -Male',
                ),
            ),
            'en-TZ' =>
            array(
                0 =>
                array(
                    'value' => 'en-TZ-ImaniNeural',
                    'label' => 'Zachery(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'en-TZ-ElimuNeural',
                    'label' => 'Lila(neural) -Male',
                ),
            ),
            'fil-PH' =>
            array(
                0 =>
                array(
                    'value' => 'fil-PH-BlessicaNeural',
                    'label' => 'Stephen(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'fil-PH-AngeloNeural',
                    'label' => 'Verla(neural) -Male',
                ),
            ),
            'gl-ES' =>
            array(
                0 =>
                array(
                    'value' => 'gl-ES-SabelaNeural',
                    'label' => 'Elton(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'gl-ES-RoiNeural',
                    'label' => 'Lelia(neural) -Male',
                ),
            ),
            'jv-ID' =>
            array(
                0 =>
                array(
                    'value' => 'jv-ID-SitiNeural',
                    'label' => 'Kieran(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'jv-ID-DimasNeural',
                    'label' => 'Carlotta(neural) -Male',
                ),
            ),
            'km-KH' =>
            array(
                0 =>
                array(
                    'value' => 'km-KH-SreymomNeural',
                    'label' => 'Adrien(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'km-KH-PisethNeural',
                    'label' => 'Destiny(neural) -Male',
                ),
            ),
            'fa-IR' =>
            array(
                0 =>
                array(
                    'value' => 'fa-IR-DilaraNeural',
                    'label' => 'Jesse(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'fa-IR-FaridNeural',
                    'label' => 'Lauriane(neural) -Male',
                ),
            ),
            'so-SO' =>
            array(
                0 =>
                array(
                    'value' => 'so-SO-UbaxNeural',
                    'label' => 'Deron(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'so-SO-MuuseNeural',
                    'label' => 'Emmie(neural) -Male',
                ),
            ),
            'es-BO' =>
            array(
                0 =>
                array(
                    'value' => 'es-BO-SofiaNeural',
                    'label' => 'Laron(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-BO-MarceloNeural',
                    'label' => 'Jalyn(neural) -Male',
                ),
            ),
            'es-CL' =>
            array(
                0 =>
                array(
                    'value' => 'es-CL-CatalinaNeural',
                    'label' => 'Claud(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-CL-LorenzoNeural',
                    'label' => 'Etha(neural) -Male',
                ),
            ),
            'es-CR' =>
            array(
                0 =>
                array(
                    'value' => 'es-CR-MariaNeural',
                    'label' => 'Milford(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-CR-JuanNeural',
                    'label' => 'Heaven(neural) -Male',
                ),
            ),
            'es-CU' =>
            array(
                0 =>
                array(
                    'value' => 'es-CU-BelkysNeural',
                    'label' => 'Raul(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-CU-ManuelNeural',
                    'label' => 'Jade(neural) -Male',
                ),
            ),
            'es-DO' =>
            array(
                0 =>
                array(
                    'value' => 'es-DO-RamonaNeural',
                    'label' => 'Mauricio(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-DO-EmilioNeural',
                    'label' => 'Lizzie(neural) -Male',
                ),
            ),
            'es-EC' =>
            array(
                0 =>
                array(
                    'value' => 'es-EC-AndreaNeural',
                    'label' => 'Remington(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-EC-LuisNeural',
                    'label' => 'Marisol(neural) -Male',
                ),
            ),
            'es-SV' =>
            array(
                0 =>
                array(
                    'value' => 'es-SV-LorenaNeural',
                    'label' => 'Boyd(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-SV-RodrigoNeural',
                    'label' => 'Yazmin(neural) -Male',
                ),
            ),
            'es-GQ' =>
            array(
                0 =>
                array(
                    'value' => 'es-GQ-TeresaNeural',
                    'label' => 'Austin(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-GQ-JavierNeural',
                    'label' => 'Dora(neural) -Male',
                ),
            ),
            'es-GT' =>
            array(
                0 =>
                array(
                    'value' => 'es-GT-MartaNeural',
                    'label' => 'Javon(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-GT-AndresNeural',
                    'label' => 'Lucinda(neural) -Male',
                ),
            ),
            'es-HN' =>
            array(
                0 =>
                array(
                    'value' => 'es-HN-KarlaNeural',
                    'label' => 'Emile(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-HN-CarlosNeural',
                    'label' => 'Alisa(neural) -Male',
                ),
            ),
            'es-NI' =>
            array(
                0 =>
                array(
                    'value' => 'es-NI-YolandaNeural',
                    'label' => 'Kieran(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-NI-FedericoNeural',
                    'label' => 'Karina(neural) -Male',
                ),
            ),
            'es-PA' =>
            array(
                0 =>
                array(
                    'value' => 'es-PA-MargaritaNeural',
                    'label' => 'Clark(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-PA-RobertoNeural',
                    'label' => 'Chloe(neural) -Male',
                ),
            ),
            'es-PY' =>
            array(
                0 =>
                array(
                    'value' => 'es-PY-TaniaNeural',
                    'label' => 'Sheldon(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-PY-MarioNeural',
                    'label' => 'Otha(neural) -Male',
                ),
            ),
            'es-PE' =>
            array(
                0 =>
                array(
                    'value' => 'es-PE-CamilaNeural',
                    'label' => 'Rolando(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-PE-AlexNeural',
                    'label' => 'Caitlyn(neural) -Male',
                ),
            ),
            'es-PR' =>
            array(
                0 =>
                array(
                    'value' => 'es-PR-KarinaNeural',
                    'label' => 'Johnpaul(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-PR-VictorNeural',
                    'label' => 'Ofelia(neural) -Male',
                ),
            ),
            'es-UY' =>
            array(
                0 =>
                array(
                    'value' => 'es-UY-ValentinaNeural',
                    'label' => 'Jeffrey(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-UY-MateoNeural',
                    'label' => 'Zelma(neural) -Male',
                ),
            ),
            'es-VE' =>
            array(
                0 =>
                array(
                    'value' => 'es-VE-PaolaNeural',
                    'label' => 'Cleveland(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'es-VE-SebastianNeural',
                    'label' => 'Lolita(neural) -Male',
                ),
            ),
            'su-ID' =>
            array(
                0 =>
                array(
                    'value' => 'su-ID-TutiNeural',
                    'label' => 'Pablo(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'su-ID-JajangNeural',
                    'label' => 'Marina(neural) -Male',
                ),
            ),
            'sw-TZ' =>
            array(
                0 =>
                array(
                    'value' => 'sw-TZ-RehemaNeural',
                    'label' => 'Neal(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'sw-TZ-DaudiNeural',
                    'label' => 'Hulda(neural) -Male',
                ),
            ),
            'ta-SG' =>
            array(
                0 =>
                array(
                    'value' => 'ta-SG-VenbaNeural',
                    'label' => 'Eric(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ta-SG-AnbuNeural',
                    'label' => 'Emmanuelle(neural) -Male',
                ),
            ),
            'ta-LK' =>
            array(
                0 =>
                array(
                    'value' => 'ta-LK-SaranyaNeural',
                    'label' => 'Derrick(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ta-LK-KumarNeural',
                    'label' => 'Linda(neural) -Male',
                ),
            ),
            'ur-IN' =>
            array(
                0 =>
                array(
                    'value' => 'ur-IN-GulNeural',
                    'label' => 'Osvaldo(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ur-IN-SalmanNeural',
                    'label' => 'Jennyfer(neural) -Male',
                ),
            ),
            'uz-UZ' =>
            array(
                0 =>
                array(
                    'value' => 'uz-UZ-MadinaNeural',
                    'label' => 'Destin(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'uz-UZ-SardorNeural',
                    'label' => 'Reta(neural) -Male',
                ),
            ),
            'zu-ZA' =>
            array(
                0 =>
                array(
                    'value' => 'zu-ZA-ThandoNeural',
                    'label' => 'Arely(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'zu-ZA-ThembaNeural',
                    'label' => 'Kristina(neural) -Male',
                ),
            ),
            'bn-IN' =>
            array(
                0 =>
                array(
                    'value' => 'bn-IN-TanishaaNeural',
                    'label' => 'Emmitt(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'bn-IN-BashkarNeural',
                    'label' => 'Kelsie(neural) -Male',
                ),
            ),
            'is-IS' =>
            array(
                0 =>
                array(
                    'value' => 'is-IS-GudrunNeural',
                    'label' => 'Gabriel(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'is-IS-GunnarNeural',
                    'label' => 'Adrienne(neural) -Male',
                ),
            ),
            'kn-IN' =>
            array(
                0 =>
                array(
                    'value' => 'kn-IN-SapnaNeural',
                    'label' => 'Jamie(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'kn-IN-GaganNeural',
                    'label' => 'Jaquelin(neural) -Male',
                ),
            ),
            'kk-KZ' =>
            array(
                0 =>
                array(
                    'value' => 'kk-KZ-AigulNeural',
                    'label' => 'Bernardo(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'kk-KZ-DauletNeural',
                    'label' => 'Jody(neural) -Male',
                ),
            ),
            'lo-LA' =>
            array(
                0 =>
                array(
                    'value' => 'lo-LA-KeomanyNeural',
                    'label' => 'Justice(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'lo-LA-ChanthavongNeural',
                    'label' => 'Irma(neural) -Male',
                ),
            ),
            'mk-MK' =>
            array(
                0 =>
                array(
                    'value' => 'mk-MK-MarijaNeural',
                    'label' => 'Kennith(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'mk-MK-AleksandarNeural',
                    'label' => 'Freeda(neural) -Male',
                ),
            ),
            'ml-IN' =>
            array(
                0 =>
                array(
                    'value' => 'ml-IN-SobhanaNeural',
                    'label' => 'Mauricio(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ml-IN-MidhunNeural',
                    'label' => 'Modesta(neural) -Male',
                ),
            ),
            'ps-AF' =>
            array(
                0 =>
                array(
                    'value' => 'ps-AF-LatifaNeural',
                    'label' => 'Rodger(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'ps-AF-GulNawazNeural',
                    'label' => 'Orie(neural) -Male',
                ),
            ),
            'sr-RS' =>
            array(
                0 =>
                array(
                    'value' => 'sr-RS-SophieNeural',
                    'label' => 'Sedrick(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'sr-RS-NicholasNeural',
                    'label' => 'May(neural) -Male',
                ),
            ),
            'si-LK' =>
            array(
                0 =>
                array(
                    'value' => 'si-LK-ThiliniNeural',
                    'label' => 'Lonzo(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'si-LK-SameeraNeural',
                    'label' => 'Katrina(neural) -Male',
                ),
            ),
            'az-AZ' =>
            array(
                0 =>
                array(
                    'value' => 'az-AZ-BabekNeural',
                    'label' => 'Edna(neural) -Male',
                ),
                1 =>
                array(
                    'value' => 'az-AZ-BanuNeural',
                    'label' => 'Darius(neural) -Female',
                ),
            ),
            'ar-LB' =>
            array(
                0 =>
                array(
                    'value' => 'ar-LB-RamiNeural',
                    'label' => 'Sonia(neural) -Male',
                ),
                1 =>
                array(
                    'value' => 'ar-LB-LaylaNeural',
                    'label' => 'Cleve(neural) -Female',
                ),
            ),
            'sq-AL' =>
            array(
                0 =>
                array(
                    'value' => 'sq-AL-IlirNeural',
                    'label' => 'Bette(neural) -Male',
                ),
                1 =>
                array(
                    'value' => 'sq-AL-AnilaNeural',
                    'label' => 'Maxine(neural) -Female',
                ),
            ),
            'ka-GE' =>
            array(
                0 =>
                array(
                    'value' => 'ka-GE-GiorgiNeural',
                    'label' => 'Lucie(neural) -Male',
                ),
                1 =>
                array(
                    'value' => 'ka-GE-EkaNeural',
                    'label' => 'Tremayne(neural) -Female',
                ),
            ),
            'mn-MN' =>
            array(
                0 =>
                array(
                    'value' => 'mn-MN-YesuiNeural',
                    'label' => 'Antonio(neural) -Female',
                ),
                1 =>
                array(
                    'value' => 'mn-MN-BataaNeural',
                    'label' => 'Bria(neural) -Male',
                ),
            ),
            'ne-NP' =>
            array(
                0 =>
                array(
                    'value' => 'ne-NP-SagarNeural',
                    'label' => 'Karlie(neural) -Male',
                ),
                1 =>
                array(
                    'value' => 'ne-NP-HemkalaNeural',
                    'label' => 'Dallas(neural) -Female',
                ),
            ),
            'bs-BA' =>
            array(
                0 =>
                array(
                    'value' => 'bs-BA-GoranNeural',
                    'label' => 'Adeline(neural) -Male',
                ),
                1 =>
                array(
                    'value' => 'bs-BA-VesnaNeural',
                    'label' => 'Adalberto(neural) -Female',
                ),
            ),
            'ar-OM' =>
            array(
                0 =>
                array(
                    'value' => 'ar-OM-AbdullahNeural',
                    'label' => 'Tiffany(neural) -Male',
                ),
                1 =>
                array(
                    'value' => 'ar-OM-AyshaNeural',
                    'label' => 'Holden(neural) -Female',
                ),
            ),
            'ta-MY' =>
            array(
                0 =>
                array(
                    'value' => 'ta-MY-SuryaNeural',
                    'label' => 'Roxanne(neural) -Male',
                ),
                1 =>
                array(
                    'value' => 'ta-MY-KaniNeural',
                    'label' => 'Davin(neural) -Female',
                ),
            ),
        );
        return $voices;
    }
    public function azureLanguageList()
    {
        return array(
            'af-ZA' => 'Afrikaans (South Africa)',
            'ar-XA' => 'Arabic',
            'ar-EG' => 'Arabic (Egypt)',
            'ar-SA' => 'Arabic (Saudi Arabia)',
            'bn-IN' => 'Bengali (India)',
            'bg-BG' => 'Bulgarian (Bulgaria)',
            'ca-ES' => 'Catalan (Spain)',
            'zh-HK' => 'Chinese (Cantonese)',
            'cmn-CN' => 'Chinese (Mandarin)',
            'zh-CN' => 'Chinese (M. Simplified)',
            'zh-TW' => 'Chinese (Taiwanese M.)',
            'hr-HR' => 'Croatian (Croatia)',
            'cs-CZ' => 'Czech (Czech Republic)',
            'da-DK' => 'Danish (Denmark)',
            'nl-BE' => 'Dutch (Belgium)',
            'nl-NL' => 'Dutch (Netherlands)',
            'en-AU' => 'English (Australia)',
            'en-CA' => 'English (Canada)',
            'en-HK' => 'English (Hongkong)',
            'en-IN' => 'English (India)',
            'en-IE' => 'English (Ireland)',
            'en-NZ' => 'English (New Zealand)',
            'en-PH' => 'English (Philippines)',
            'en-SG' => 'English (Singapore)',
            'en-ZA' => 'English (South Africa)',
            'en-GB' => 'English (UK)',
            'en-US' => 'English (USA)',
            'et-EE' => 'Estonian (Estonia)',
            'fil-PH' => 'Filipino (Philippines)',
            'fi-FI' => 'Finnish (Finland)',
            'fr-BE' => 'French (Belgium)',
            'fr-FR' => 'French (France)',
            'fr-CA' => 'French (Canada)',
            'fr-CH' => 'French (Switzerland)',
            'de-AT' => 'German (Austria)',
            'de-DE' => 'German (Germany)',
            'de-CH' => 'German (Switzerland)',
            'el-GR' => 'Greek (Greece)',
            'gu-IN' => 'Gujarati (India)',
            'he-IL' => 'Hebrew (Israel)',
            'hi-IN' => 'Hindi (India)',
            'hu-HU' => 'Hungarian (Hungary)',
            'is-IS' => 'Icelandic (Iceland)',
            'id-ID' => 'Indonesian (Indonesia)',
            'ga-IE' => 'Irish (Ireland)',
            'it-IT' => 'Italian (Italy)',
            'ja-JP' => 'Japanese (Japan)',
            'kn-IN' => 'Kannada (India)',
            'ko-KR' => 'Korean (South Korea)',
            'lv-LV' => 'Latvian (Latvia)',
            'lt-LT' => 'Lithuanian (Lithuania)',
            'ml-IN' => 'Malayalam (India)',
            'ms-MY' => 'Malay (Malaysia)',
            'mt-MT' => 'Maltese (Malta)',
            'mr-IN' => 'Marathi (India)',
            'nb-NO' => 'Norwegian (Norway)',
            'pl-PL' => 'Polish (Poland)',
            'pt-BR' => 'Portuguese (Brazil)',
            'pt-PT' => 'Portuguese (Portugal)',
            'ro-RO' => 'Romanian (Romania)',
            'ru-RU' => 'Russian (Russia)',
            'sr-RS' => 'Serbian (Serbia)',
            'sk-SK' => 'Slovak (Slovakia)',
            'sl-SI' => 'Slovenian (Slovenia)',
            'es-AR' => 'Spanish (Argentina)',
            'es-CO' => 'Spanish (Colombia)',
            'es-ES' => 'Spanish (Spain)',
            'es-MX' => 'Spanish (Mexico)',
            'es-US' => 'Spanish (USA)',
            'sw-KE' => 'Swahili (Kenya)',
            'sv-SE' => 'Swedish (Sweden)',
            'ta-IN' => 'Tamil (India)',
            'te-IN' => 'Telugu (India)',
            'th-TH' => 'Thai (Thailand)',
            'tr-TR' => 'Turkish (Turkey)',
            'uk-UA' => 'Ukrainian (Ukraine)',
            'ur-PK' => 'Urdu (Pakistan)',
            'vi-VN' => 'Vietnamese (Vietnam)',
            'cy-GB' => 'Welsh (Wales)',
            'am-ET' => 'Amharic (Ethiopia)',
            'ar-DZ' => 'Arabic (Algeria)',
            'ar-BH' => 'Arabic (Bahrain)',
            'ar-IQ' => 'Arabic (Iraq)',
            'ar-JO' => 'Arabic (Jordan)',
            'ar-KW' => 'Arabic (Kuwait)',
            'ar-LY' => 'Arabic (Libya)',
            'ar-MA' => 'Arabic (Morocco)',
            'ar-QA' => 'Arabic (Qatar)',
            'ar-SY' => 'Arabic (Syria)',
            'ar-TN' => 'Arabic (Tunisia)',
            'ar-AE' => 'Arabic (UAE)',
            'ar-YE' => 'Arabic (Yemen)',
            'bn-BD' => 'Bangla (Bangladesh)',
            'my-MM' => 'Burmese (Myanmar)',
            'en-KE' => 'English (Kenya)',
            'en-NG' => 'English (Nigeria)',
            'en-TZ' => 'English (Tanzania)',
            'gl-ES' => 'Galician (Spain)',
            'jv-ID' => 'Javanese (Indonesia)',
            'fa-IR' => 'Persian (Iran)',
            'km-KH' => 'Khmer (Cambodia)',
            'so-SO' => 'Somali (Somalia)',
            'es-BO' => 'Spanish (Bolivia)',
            'es-CL' => 'Spanish (Chile)',
            'es-CR' => 'Spanish (Costa Rica)',
            'es-CU' => 'Spanish (Cuba)',
            'es-DO' => 'Spanish (Dominican Republic)',
            'es-EC' => 'Spanish (Ecuador)',
            'es-SV' => 'Spanish (El Salvador)',
            'es-GQ' => 'Spanish (Equatorial Guinea)',
            'es-GT' => 'Spanish (Guatemala)',
            'es-HN' => 'Spanish (Honduras)',
            'es-NI' => 'Spanish (Nicaragua)',
            'es-PA' => 'Spanish (Panama)',
            'es-PY' => 'Spanish (Paraguay)',
            'es-PE' => 'Spanish (Peru)',
            'es-PR' => 'Spanish (Puerto Rico)',
            'es-UY' => 'Spanish (Uruguay)',
            'es-VE' => 'Spanish (Venezuela)',
            'su-ID' => 'Sundanese (Indonesia)',
            'sw-TZ' => 'Swahili (Tanzania)',
            'ta-SG' => 'Tamil (Singapore)',
            'ta-LK' => 'Tamil (Sri Lanka)',
            'ur-IN' => 'Urdu (India)',
            'uz-UZ' => 'Uzbek (Uzbekistan)',
            'zu-ZA' => 'Zulu (South Africa)',
            'kk-KZ' => 'Kazakh (Kazakhstan)',
            'lo-LA' => 'Lao (Laos)',
            'mk-MK' => 'Macedonian (Macedonia)',
            'ps-AF' => 'Pashto (Afghanistan)',
            'si-LK' => 'Sinhala (Sri Lanka)',
            'pa-IN' => 'Punjabi (India)',
            'az-AZ' => 'Azerbaijani (Azerbaijan)',
            'ar-LB' => 'Arabic (Lebanon)',
            'sq-AL' => 'Albanian (Albania)',
            'ka-GE' => 'Georgian (Georgia)',
            'mn-MN' => 'Mongolian (Mongolia)',
            'ne-NP' => 'Nepali (Nepal)',
            'bs-BA' => 'Bosnian (Bosnia and Herzegovina)',
            'ar-OM' => 'Arabic (Oman)',
            'ta-MY' => 'Tamil (Malaysia)',
        );
    }
}
