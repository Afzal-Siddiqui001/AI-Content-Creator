<?php

namespace App\Http\Controllers\Backend\AI;

use App\Http\Controllers\Controller;
use App\Models\CustomTemplate;
use App\Models\Project;
use App\Models\ProjectLog;
use App\Models\SubscriptionHistory;
use App\Models\SubscriptionPackageTemplate;
use App\Models\Template;
use App\Models\TemplateUsage;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;
use Str;

class GenerateContentsController extends Controller
{
    # generate contents
    public function generate(Request $request)
    {
        $user = auth()->user();

        # 1. init openAi
        $open_ai = new OpenAi(openAiKey());

        $template = Template::where('code', $request->template_code)->first();
        if (empty($template)) {
            abort(404);
        }

        # 2. verify if user has access to the template [template available in subscription package]
        if ($user->user_type == "customer") {
            // check package balance
            $checkBalanceData = activePackageBalance();
            if (!empty($checkBalanceData)) {
                return $checkBalanceData;
            }
            // check word limit  
            if (availableDataCheck('words') <= 0) {
                $data = [
                    'status'  => 400,
                    'success' => false,
                    'message' => localize('Your word balance is low, please upgrade you plan'),
                ];
                return $data;
            }
        }

        # 4. generate prompt in selected language 
        $max_tokens     = getSetting('default_max_result_length', -1);

        if ($request->max_tokens != null) {
            $max_tokens     = (int)$request->max_tokens;
        }
        $inputAll = $request->all();
        $inputAll['max_tokens'] = $max_tokens;

        $parsePromptsController = new ParsePromptsController;
        $prompt                 = $parsePromptsController->index($inputAll);

        if (preg_match("/bad_words_found/i", $prompt) == 1) {
            $badWords =  explode('_#themeTags', rtrim($prompt, ","));
            $data = [
                'status'  => 400,
                'success' => false,
                'message' => localize('Please remove these words from your inputs') . '-' . $badWords[1],
            ];
            return $data;
        }

        # 5. apply openAi model based on admin configuration  
        $model = 'gpt-3.5-turbo'; // default model
        if ($user->user_type == "customer" && activePackageHistory() && activePackageHistory()->subscriptionPackage) {
            $model = activePackageHistory()->subscriptionPackage->openai_model->key;
        }

        # 6. generate contents
        $temperature    = (float)$request->creativity;
        $n              = (int)$request->num_of_results;
        $num_of_results = 1;

        $latestModels = [
            'gpt-4',
            'gpt-4-32k',
            'gpt-3.5-turbo'
        ];

        // ai params
        $aiParams = [
            'model' => $model,
            'temperature' => $temperature,
            'n' => $n,
        ];

        if ($max_tokens != -1) {
            $aiParams['max_tokens'] = $max_tokens;
        }

        # make api call to openAi
        if (in_array($model, $latestModels)) {
            $aiParams['messages'] = [[
                "role" => "user",
                "content" => $prompt
            ]];
            $result = $open_ai->chat($aiParams);
        } else {
            $aiParams['prompt'] = $prompt;
            $result = $open_ai->completion($aiParams);
        }

        # parse response
        $result = json_decode($result, true);

        $outputContents = '';
        if (isset($result['choices'])) {
            if (in_array($model, $latestModels)) {
                if (count($result['choices']) > 1) {
                    foreach ($result['choices'] as $value) {
                        $outputContents .= '<b>[Output-' . $num_of_results . ']</b>' . "\r\n" . trim($value['message']['content']) . "\r\n\r\n\r\n";
                        $num_of_results++;
                    }
                } else {
                    $outputContents = ($result['choices'][0]['message']['content']);
                }
            } else {
                if (count($result['choices']) > 1) {
                    foreach ($result['choices'] as $value) {
                        $outputContents .= '<b>[Output-' . $num_of_results . ']</b>' . "\r\n" . ltrim($value['text']) . "\r\n\r\n\r\n";
                        $num_of_results++;
                    }
                } else {
                    $outputContents = ($result['choices'][0]['text']);
                }
            }

            // $outputContents = nl2br($outputContents);
            $outputContents = str_replace(["\r\n", "\r", "\n"], "<br/>", $outputContents);
            $promptsToken = $result['usage']['prompt_tokens'];
            $completionToken = $result['usage']['completion_tokens'];
            $tokens = $result['usage']['total_tokens'];

            # 7. Save it as a project 
            $projectTitle = "Untitled Project - " . date("Y-m-d");
            if ($request->project_id == null) {
                $project = new Project;
                $project->user_id       = $user->id;
                $project->template_id   = $template->id;
                $project->model_name    = $model;
                $project->title         = $projectTitle;
                $project->slug          = preg_replace('/\s+/', '-', trim($projectTitle)) . '-' . strtolower(Str::random(5));
                $project->prompts       = $promptsToken;
                $project->completion    = $completionToken;
                $project->words         = $tokens;
                $project->content_type  = 'content';
                $project->content       = trim($outputContents);
                $project->save();
            } else {
                $project = Project::where('id', $request->project_id)->first();
                if (!is_null($project)) {
                    $project->words         = $tokens;
                    $project->content       = trim($outputContents);
                    $project->save();
                }
            }

            $latestPackage = activePackageHistory();
            $previousBalance = $latestPackage ?  $latestPackage->this_month_available_words : null;
            $after_balance = $latestPackage ? $latestPackage->this_month_available_words - $project->words : null;
            # keep log
            $logData = [
                'user_id' => $project->user_id,
                'project_id' => $project->id,
                'subscription_history_id' => optional(activePackageHistory())->id,
                'subscription_package_id' => optional(activePackageHistory())->subscription_package_id,
                'template_id' => $project->template_id,
                'model_name' => $project->model_name,
                'content' => $project->content,
                'content_type' => $project->content_type,
                'words' => $project->words,
                'prompt_words' => $promptsToken,
                'completion_words' => $completionToken,
                'previous_balance' => $previousBalance,
                'after_balance' => $after_balance
            ];
            $this->createLog($logData);

            # 8. update word limit for user or admin/staff
            $this->updateUserWords($tokens, $user);

            # 9. update template usage
            $this->updateTemplateUsages($tokens, $template, $user);

            $data = [
                'status'            => 200,
                'success'           => true,
                'output'            => trim($outputContents),
                'title'             => $projectTitle,
                'project_id'        => $project->id ?? '',
                'usedPercentage'    => view('backend.pages.templates.inc.used-words-percentage')->render(),
            ];
            return $data;
        } else {
            if (isset($result['error']['message'])) {
                $message = $result['error']['message'];
            } else {
                $message = localize('There is an issue with the openai account');
            }
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

    # generate contents
    public function generateCustom(Request $request)
    {
        $user = auth()->user();

        # 1. init openAi
        $open_ai = new OpenAi(openAiKey());

        $template = CustomTemplate::where('code', $request->template_code)->first();
        if (empty($template)) {
            abort(404);
        }

        # 2. verify if user has access to the template [template available in subscription package]
        if ($user->user_type == "customer") {
            // check package balance

            $checkBalanceData = activePackageBalance('allow_custom_templates');
            if (!empty($checkBalanceData)) {
                return $checkBalanceData;
            }
            // check word limit  
            if (availableDataCheck('words') <= 0) {
                $data = [
                    'status'  => 400,
                    'success' => false,
                    'message' => localize('Your word balance is low, please upgrade you plan'),
                ];
                return $data;
            }
        }

        # 4. generate prompt
        $prompt  = $template->prompt;

        // dd($request->all());
        foreach ($request->all() as $name => $inpVal) {
            if ($name != '_token' && $name != 'project_id' && $name != 'max_tokens') {
                $name = '{_' . $name . '_}';
                if (!is_null($inpVal) && !is_null($name)) {
                    $prompt = str_replace($name, $inpVal, $prompt);
                } else {
                    $data = [
                        'status'  => 400,
                        'success' => false,
                        'message' => localize('Your input does not match with the custom prompt'),
                    ];
                    return $data;
                }
            }
        }


        # 5. apply openAi model based on admin configuration  
        $model = 'gpt-3.5-turbo'; // default model
        if ($user->user_type == "customer" && activePackageHistory() && activePackageHistory()->subscriptionPackage) {
            $model = activePackageHistory()->subscriptionPackage->openai_model->key;
        }

        # 6. generate contents
        $temperature    = (float)$request->creativity;
        $max_tokens     =  getSetting('default_max_result_length', -1);

        if ($request->max_tokens != null) {
            $max_tokens     = (int)$request->max_tokens;
        }

        $n              = (int)$request->num_of_results;
        $num_of_results = 1;

        $latestModels = [
            'gpt-4',
            'gpt-4-32k',
            'gpt-3.5-turbo'
        ];

        // ai params
        $aiParams = [
            'model' => $model,
            'temperature' => $temperature,
            'n' => $n,
        ];

        if ($max_tokens != -1 && $max_tokens != 0) {
            $aiParams['max_tokens'] = (int) $max_tokens;
        }

        $prompt .= 'Write in ' . $request->lang . ' language.'  . ' The tone of voice should be ' . $request->tone . ' and the maximum length ' . $max_tokens . ' words. Do not write translations.';

        # make api call to openAi
        if (in_array($model, $latestModels)) {
            $aiParams['messages'] = [[
                "role" => "user",
                "content" => $prompt
            ]];
            $result = $open_ai->chat($aiParams);
        } else {
            $aiParams['prompt'] = $prompt;
            $result = $open_ai->completion($aiParams);
        }

        # parse response
        $result = json_decode($result, true);

        $outputContents = '';
        if (isset($result['choices'])) {
            if (in_array($model, $latestModels)) {
                if (count($result['choices']) > 1) {
                    foreach ($result['choices'] as $value) {
                        $outputContents .= '<b>[Output-' . $num_of_results . ']</b>' . "\r\n" . trim($value['message']['content']) . "\r\n\r\n\r\n";
                        $num_of_results++;
                    }
                } else {
                    $outputContents = ($result['choices'][0]['message']['content']);
                }
            } else {
                if (count($result['choices']) > 1) {
                    foreach ($result['choices'] as $value) {
                        $outputContents .= '<b>[Output-' . $num_of_results . ']</b>' . "\r\n" . ltrim($value['text']) . "\r\n\r\n\r\n";
                        $num_of_results++;
                    }
                } else {
                    $outputContents = ($result['choices'][0]['text']);
                }
            }

            // $outputContents = nl2br($outputContents);  
            $outputContents = str_replace(["\r\n", "\r", "\n"], "<br/>", $outputContents);

            $promptsToken = $result['usage']['prompt_tokens'];
            $completionToken = $result['usage']['completion_tokens'];
            $tokens = $result['usage']['total_tokens'];

            # 7. Save it as a project 
            $projectTitle = "Untitled Project - " . date("Y-m-d");
            if ($request->project_id == null) {
                $project = new Project;
                $project->user_id       = $user->id;
                $project->custom_template_id   = $template->id;
                $project->model_name    = $model;
                $project->title         = $projectTitle;
                $project->slug          = preg_replace('/\s+/', '-', trim($projectTitle)) . '-' . strtolower(Str::random(5));
                $project->prompts       = $promptsToken;
                $project->completion    = $completionToken;
                $project->words         = $tokens;
                $project->content_type  = 'content';
                $project->content       = trim($outputContents);
                $project->save();
            } else {
                $project = Project::where('id', $request->project_id)->first();
                if (!is_null($project)) {
                    $project->words         = $tokens;
                    $project->content       = trim($outputContents);
                    $project->save();
                }
            }


            $latestPackage = activePackageHistory();
            $previousBalance = $latestPackage ? $latestPackage->this_month_available_words : null;
            $after_balance = $latestPackage ? $latestPackage->this_month_available_words - $project->words : null;
            # keep log
            $logData = [
                'user_id' => $project->user_id,
                'project_id' => $project->id,
                'subscription_history_id' => optional(activePackageHistory())->id,
                'subscription_package_id' => optional(activePackageHistory())->subscription_package_id,
                'custom_template_id' => $project->custom_template_id,
                'model_name' => $project->model_name,
                'content' => $project->content,
                'content_type' => $project->content_type,
                'words' => $project->words,
                'prompt_words' => $promptsToken,
                'completion_words' => $completionToken,
                'previous_balance' => $previousBalance,
                'after_balance' => $after_balance
            ];
            $this->createLog($logData);

            # 8. update word limit for user or admin/staff
            $this->updateUserWords($tokens, $user);

            # 9. update template usage
            $this->updateTemplateUsages($tokens, $template, $user, true);

            $data = [
                'status'            => 200,
                'success'           => true,
                'output'            => trim($outputContents),
                'title'             => $projectTitle,
                'project_id'        => $project->id ?? '',
                'usedPercentage'    => view('backend.pages.templates.inc.used-words-percentage')->render(),
            ];
            return $data;
        } else {
            if (isset($result['error']['message'])) {
                $message = $result['error']['message'];
            } else {
                $message = localize('There is an issue with the openai account');
            }
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

    # updateUserWords - take token as word
    public function updateUserWords($tokens, $user)
    {
        if ($user->user_type == "customer") {
            updateDataBalance('words', $tokens, $user);
        }
    }

    # updateTemplateUsages - take token as word
    public function updateTemplateUsages($tokens, $template, $user, $customTemplate = false)
    {
        // user wise template usage
        $template->total_words_generated += (int) $tokens;
        $template->save();

        // user wise template usage
        $templateUsage                      = new TemplateUsage;
        $templateUsage->user_id             = $user->id;
        if ($customTemplate) {
            $templateUsage->custom_template_id         = $template->id;
        } else {
            $templateUsage->template_id         = $template->id;
        }
        $templateUsage->total_used_words    = (int) $tokens;
        $templateUsage->save();
    }

    # keep log
    public function createLog($data)
    {
        ProjectLog::create($data);
    }
}
