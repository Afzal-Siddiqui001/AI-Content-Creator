<?php

namespace App\Http\Controllers\Backend\AI;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\SubscriptionHistory;
use App\Models\SubscriptionPackage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Str;

class GenerateSdImagesController extends Controller
{
    public function __construct()
    {
        if (getSetting('enable_ai_images') == '0') {
            redirect()->route('writebot.dashboard')->send();
        }
    }

    # images
    public function index(Request $request)
    {
        $user = auth()->user();

        if ($user->user_type == "customer") {
            $package = optional(activePackageHistory())->subscriptionPackage ?? new SubscriptionPackage;
            if ($package->allow_sd_images == 0) {
                abort(403);
            }
        } else {
            if (!auth()->user()->can('generate_images')) {
                abort(403);
            }
        }

        $searchKey = null;
        $images = Project::where('content_type', 'image')->where('engine', 'SD')->where('user_id', auth()->user()->id)->latest();

        if ($request->search != null) {
            $images = $images->where('title', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }

        $images = $images->paginate(paginationNumber(18));
        return view('backend.pages.templates.generate-sd-images', ['images' => $images, 'searchKey' => $searchKey]);
    }

    # generate images
    public function generate(Request $request)
    {

        if (env('DEMO_MODE') == "On") {
            $data = [
                'status'  => 400,
                'success' => false,
                'message' => localize('Image generation is turned off in demo')
            ];
            return $data;
        }

        $user = auth()->user();

        # 1. init api key
        $api_key = openAiKey('sd');
        # 2. verify if user has access to the template [template available in subscription package]
        if ($user->user_type == "customer") {
            $data = activePackageBalance('allow_images');
            if (!empty($data)) {
                return $data;
            }

            // check images limit  
            if (availableDataCheck('images')  < (int)$request->num_of_results) {
                $data = [
                    'status'  => 400,
                    'success' => false,
                    'message' => localize('Your limit is low, please upgrade you plan'),
                ];
                return $data;
            }
        }

        $url = 'https://api.stability.ai/v1/generation/' . getSetting('image_stable_diffusion_engine') . '/text-to-image';

        $headers = [
            'Authorization:' . $api_key,
            'Content-Type: application/json',
        ];

        $n              = 1;
        if (env('DEMO_MODE') == 'Off') {
            $n              = (int)$request->num_of_results;
        }

        $key2 = 1;
        if ($request->type == "text-to-image") {
            $parsePromptsController = new ParsePromptsController;
            $prompt                 = $parsePromptsController->images($request->all());
            $data['text_prompts'][0]['text'] = $prompt;
            $data['text_prompts'][0]['weight'] = 1;
        } else {
            $style = $request->style;
            $mood = $request->mood;
            if ($style == "none") {
                $style = "";
            }
            if ($mood == "none") {
                $mood = "";
            }

            $proTitle = '';
            foreach ($request->titles as $key => $title) {
                $prompt2 = $title;
                $proTitle .= $title . ', ';
                if ($style != "") {
                    $prompt2 .= ',' . $style;
                }

                if ($mood != "") {
                    $mood .= ',' . $mood;
                }
                $data['text_prompts'][$key]['text'] = $prompt2;
                $data['text_prompts'][$key]['weight'] = 1;
                $key2 += 1;
            }
        }

        if ($request->negative_prompts && $request->type == "text-to-image") {
            $data['text_prompts'][$key2]['text'] = $request->negative_prompts;
            $data['text_prompts'][$key2]['weight'] = -1;
        }

        $resolutions = explode('x', $request->resolution);
        $width = $resolutions[0];
        $height = $resolutions[1];

        $data['clip_guidance_preset'] = $request->preset;
        $data['height'] = (int)$height;
        $data['width'] = (int)$width;
        if ($request->diffusion_samples != 'none') {
            $data['sampler'] = $request->diffusion_samples;
        }

        $data['samples'] = $n;
        if ($request->style != 'none') {
            $data['style_preset'] = $request->style;
        }
        // dd($data);

        $postData = json_encode($data);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $result = curl_exec($ch);
        curl_close($ch);

        # parse response
        $result = json_decode($result, true);
        if (isset($result['artifacts'])) {
            foreach ($result['artifacts'] as $key => $value) {
                $name = Str::random(10) . '.png';
                $image = base64_decode($value['base64']);
                file_put_contents(public_path('images/' . $name), $image);

                $project = new Project;
                $project->user_id       = $user->id;
                $project->title         = $request->title ? $request->title : $proTitle . '-' . ($key + 1);
                $project->slug          = preg_replace('/\s+/', '-', trim($project->title)) . '-' . strtolower(Str::random(5));
                $project->content_type  = 'image';
                $project->resolution    = $width . 'x' . $height;
                $project->content       = 'images/' . $name;
                $project->engine        = 'SD';
                $project->save();
            }

            $latestPackage = activePackageHistory();
            $previousBalance = $latestPackage ? $latestPackage->this_month_available_images : null;
            $after_balance = $latestPackage ? $latestPackage->this_month_available_images - 1 : null;
            # keep log
            $logData = [
                'user_id' => $project->user_id,
                'project_id' => $project->id,
                'subscription_history_id' => optional(activePackageHistory())->id,
                'subscription_package_id' => optional(activePackageHistory())->subscription_package_id,
                'content' => $project->content,
                'content_type' => $project->content_type,
                'resolution' => $project->resolution,
                'previous_balance' => $previousBalance,
                'after_balance' => $after_balance
            ];
            $generateController = new GenerateContentsController();
            $generateController->createLog($logData);

            # Update credit balance
            $this->updateUserImages($user, $n);

            $images = Project::where('content_type', 'image')->where('engine', 'SD')->where('user_id', auth()->user()->id)->latest();
            $images = $images->paginate(paginationNumber(18));

            $data = [
                'status'            => 200,
                'success'           => true,
                'images'            => view('backend.pages.templates.inc.images-list', compact('images'))->render(),
                'usedPercentage'    => view('backend.pages.templates.inc.used-images-percentage')->render(),
            ];
            return $data;
        } else {
            $message = localize('There was an issue generating your AI Image, please try again or contact support team');
            $data = [
                'status'  => 400,
                'success' => false,
                'message' => $message
            ];
            return $data;
        }

        $data = [
            'status'  => 500,
            'success' => false,
        ];
        return $data;
    }

    # updateUserImages - take n
    public function updateUserImages($user, $n)
    {
        if ($user->user_type == "customer") {
            updateDataBalance('images', $n, $user);
        }
    }

    # delete image
    public function delete($id)
    {
        $image = Project::where('user_id', auth()->user()->id)->where('id', $id)->first();
        if (!is_null($image)) {
            try {
                fileDelete($image->content);
            } catch (\Throwable $th) {
                //throw $th;
            }
            $image->delete();
        }
        flash(localize('Image has been deleted successfully'))->success();
        return back();
    }
}
