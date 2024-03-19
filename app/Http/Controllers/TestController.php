<?php

namespace App\Http\Controllers;

use App\Traits\Language;
use Illuminate\Http\Request;
use Faker\Generator as Faker;

class TestController extends Controller
{
    //
    use Language;
    public function index(Faker $faker)
    {
        // "af-ZA" => [
        //     [
        //         'value' => "af-ZA-Standard-A",
        //         'label' => "Standart - FEMALE"
        //     ]
        // ],
        // "ar-XA" => [
        //     [
        //         'value' => "ar-XA-Standard-A",
        //         'label' => "Standard - FEMALE"
        //     ],
        //     [
        //         'value' => "ar-XA-Standard-B",
        //         'label' => "Standard - MALE"
        //     ],
        //     [
        //         'value' => "ar-XA-Standard-C",
        //         'label' => "Standard - MALE"
        //     ],
        //     [
        //         'value' => "ar-XA-Standard-D",
        //         'label' => "Standard - FEMALE"
        //     ],
        //     [
        //         'value' => "ar-XA-Wavenet-A",
        //         'label' => "WaveNet - FEMALE"
        //     ],
        //     [
        //         'value' => "ar-XA-Wavenet-B",
        //         'label' => "WaveNet - MALE"
        //     ],
        //     [
        //         'value' => "ar-XA-Wavenet-C",
        //         'label' => "WaveNet - MALE"
        //     ],
        //     [
        //         'value' => "ar-XA-Wavenet-D",
        //         'label' => "WaveNet - FEMALE"
        //     ]
        // ],

        // "voice" => "Salma"
        // "voice_id" => "ar-EG-SalmaNeural"
        // "gender" => "Female"
        // "language_code" => "ar-EG"
        // "vendor_id" => "azure_nrl"
        // "voice_type" => "neural"
        // "sample_url" => "/voices/azure/salma.mp3"
        // "status" => "active"
        // "vendor" => "azure"
        // "vendor_img" => "/img/csp/azure-sm.png"
        // "avatar_url" => "/voices/azure/avatars/17.jpg"
        $file_name = 'azure_voice_details';
        $lists = $this->azureList();
        $data = [];

        foreach ($lists as $key => $list) {
            $name = $list['gender'] == 'Female' ? $faker->firstNameMale() : $faker->firstNameFemale();
            $data[$list['language_code']][] = array(
                'value' => $list['voice_id'],
                'label' => $name . '(' . $list['voice_type'] . ') -' . $list['gender']
            );
        }

        file_put_contents($file_name . '.php', '<?php  ' . var_export($data, true) . ';');
        dd($data);
    }
}
