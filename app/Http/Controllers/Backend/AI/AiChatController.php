<?php

namespace App\Http\Controllers\Backend\AI;

use App\Http\Controllers\Controller;
use App\Mail\EmailManager;
use App\Models\AiChat;
use App\Models\AiChatCategory;
use App\Models\AiChatMessage;
use App\Models\SubscriptionPackage;
use App\Notifications\EmailChatMessages;
use Illuminate\Http\Request;
use Orhanerday\OpenAi\OpenAi;
use Mail;

class AiChatController extends Controller
{
    public function __construct()
    {
        if (getSetting('enable_ai_chat') == '0') {
            flash(localize('AI chat is not available'))->info();
            redirect()->route('writebot.dashboard')->send();
        }
    }

    # chat index
    public function index(Request $request)
    {
        $searchKey = null;
        $user = auth()->user();
        if ($user->user_type == "customer") {
            $package = optional(activePackageHistory())->subscriptionPackage ?? new SubscriptionPackage;
            if ($package->allow_ai_chat == 0) {
                abort(403);
            }
        } else {
            if (!auth()->user()->can('ai_chat')) {
                abort(403);
            }
        }

        $chatExpertIds = [];
        if ($user->user_type != "customer") {
            $chatExpertIds = AiChatCategory::oldest()->pluck('id');
            $chatExperts = AiChatCategory::oldest()->get();
        } else {
            $chatExpertIds = AiChatCategory::oldest()->where('is_active', 1)->pluck('id');
            $chatExperts = AiChatCategory::oldest()->where('is_active', 1)->get();
        }

        $chatListQuery = AiChat::orderBy('updated_at', 'DESC')->where('user_id', $user->id)->whereIn('ai_chat_category_id', $chatExpertIds);

        if ($request->search != null) {
            $chatListQuery = $chatListQuery->where('title', 'like', '%' . $request->search . '%');
            $searchKey = $request->search;
        }

        if ($request->expert != null) {
            $chatList     = $chatListQuery->where('ai_chat_category_id', $request->expert)->get();
        } else {
            $chatList     = $chatListQuery->where('ai_chat_category_id', 1)->get();
        }

        $conversation = $chatListQuery->first();
        return view('backend.pages.aiChat.index', compact('chatExperts', 'chatList', 'conversation', 'searchKey'));
    }

    # new conversation
    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->user_type == "customer") {
            $package = optional(activePackageHistory())->subscriptionPackage ?? new SubscriptionPackage;
            if ($package->allow_ai_chat == 0) {
                $data = [
                    'status'  => 400,
                    'success' => false,
                    'message' => localize('AI Chat is not available in this package, please upgrade you plan'),
                ];
                return $data;
            }
        }
        $expert = AiChatCategory::whereId((int)$request->ai_chat_category_id)->first();

        $conversation                      = new AiChat;
        $conversation->user_id             = $user->id;
        $conversation->ai_chat_category_id = $request->ai_chat_category_id;
        $conversation->title               = $expert->name . ' Chat';
        $conversation->save();

        $message = new AiChatMessage;
        $message->ai_chat_id = $conversation->id;
        $message->user_id    = $user->id;
        if ($expert->role == 'default') {
            $result =  "Hello! I am $expert->name, and I'm here to answer your all questions.";
        } else {
            $result =  "Hello! I am $expert->name, and I'm $expert->role. $expert->assists_with.";
        }
        $message->response   = $result;
        $message->result   = $result;
        $message->save();

        $chatList = AiChat::latest();
        $chatList = $chatList->where('ai_chat_category_id', $expert->id)->where('user_id', $user->id)->get();

        $data = [
            'status'                 => 200,
            'chatList'               => view('backend.pages.aiChat.inc.chat-list', compact('chatList'))->render(),
            'messagesContainer'      => view('backend.pages.aiChat.inc.messages-container', compact('conversation'))->render(),
        ];
        return $data;
    }

    # update conversation
    public function update(Request $request)
    {
        $conversation = AiChat::whereId((int) $request->chatId)->first();
        $conversation->title = $request->value;
        $conversation->save();
    }

    # delete conversation
    public function delete($id)
    {
        $conversation = AiChat::findOrFail((int)$id);
        AiChatMessage::where('ai_chat_id', $conversation->id)->delete();
        $conversation->delete();
        flash(localize('Chat has been deleted successfully'))->success();
        return back();
    }

    # new message
    public function newMessage(Request $request)
    {
        $chat = AiChat::where('id', $request->chat_id)->first();
        $category = AiChatCategory::where('id', $request->category_id)->first();

        $user = auth()->user();

        // check word limit  
        if ($user->user_type == 'customer' && availableDataCheck('words') <= 0) {
            $data = [
                'status'  => 400,
                'success' => false,
                'message' => localize('Your word balance is low, please upgrade you plan'),
            ];
            return $data;
        }


        $prompt = $request->prompt;
        $total_used_tokens = 0;

        $message                = new AiChatMessage;
        $message->ai_chat_id    = $chat->id;
        $message->user_id       = $user->id;
        $message->prompt        = $prompt;
        $message->result        = $prompt;
        $message->save();

        $message->aiChat->touch(); // updated at

        $chat_id = $chat->id;
        $message_id = $message->id;

        $request->session()->put('chat_id', $chat_id);
        $request->session()->put('message_id', $message_id);

        $data = [
            'status'  => 200,
            'success' => false,
            'message' => '',
        ];
        return $data;
    }

    # ai response
    public function process()
    {

        return response()->stream(function () {

            $chat_id    = session('chat_id');
            $message_id = session('message_id');

            $message    = AiChatMessage::whereId((int)$message_id)->first();
            $prompt     = $message->prompt ?? '';

            $chat                   = AiChat::whereId((int) $chat_id)->first();
            $lastSixMessageQuery    = $chat->messages()->latest()->take(6);
            $lastSixMessage         = $lastSixMessageQuery->get()->reverse();

            $history[] = ["role" => "system", "content" => "You are a helpful assistant."];
            if (count($lastSixMessage) > 1) {
                foreach ($lastSixMessage as $sixMessage) {
                    if ($sixMessage->prompt != null) {
                        $history[] = ["role" => "user", "content" => $sixMessage->prompt];
                    } else {
                        $history[] = ["role" => "assistant", "content" => $sixMessage->response];
                    }
                }
            } else {
                $history[] = ["role" => "user", "content" => $prompt];
            }

            $user = auth()->user();

            # 1. init openAi
            $open_ai = new OpenAi(openAiKey());

            $opts = [
                'model' => 'gpt-3.5-turbo',
                'messages' => $history,
                'temperature' => 1.0,
                'presence_penalty' => 0.6,
                'frequency_penalty' => 0,
                'stream' => true
            ];

            $text = "";
            $output = "";

            $open_ai->chat($opts, function ($curl_info, $data) use (&$text) {
                if ($obj = json_decode($data) and $obj->error->message != "") {
                    error_log(json_encode($obj->error->message));
                } else {
                    echo $data;

                    $clean = str_replace("data: ", "", $data);
                    $first = str_replace("}\n\n{", ",", $clean);

                    if (str_contains($first, 'assistant')) {
                        $raw = str_replace('"choices":[{"delta":{"role":"assistant"', '"random":[{"alpha":{"role":"assistant"', $first);
                        $response = json_decode($raw, true);
                    } else {
                        $response = json_decode($clean, true);
                    }

                    if ($data != "data: [DONE]\n\n" and isset($response["choices"][0]["delta"]["content"])) {
                        $text .= $response["choices"][0]["delta"]["content"];
                    }
                }

                echo PHP_EOL;
                if (ob_get_level() < 1) {
                    ob_start();
                }

                echo "\n\n";
                ob_flush();
                flush();
                return strlen($data);
            });


            # Update credit balance
            $words = count(explode(' ', ($text))); // todo:: add user input counter
            $this->updateUserWords($words, $user);

            $output     = str_replace(["\r\n", "\r", "\n"], "<br/>", $text);

            $message                = new AiChatMessage;
            $message->ai_chat_id    = $chat_id;
            $message->user_id       = $user->id;
            $message->response      = $text;
            $message->result        = $output;
            $message->words         = $words;
            $message->save();
        }, 200, [
            'Cache-Control' => 'no-cache',
            'Content-Type' => 'text/event-stream',
        ]);
    }

    # updateUserWords - take token as word
    public function updateUserWords($tokens, $user)
    {
        if ($user->user_type == "customer") {
            updateDataBalance('words', $tokens, $user);
        }
    }

    # get messages
    public function getMessages(Request $request)
    {
        $conversation = AiChat::whereId((int) $request->chatId)->first();
        if (is_null($conversation)) {
            $data = [
                'status'                 => 400
            ];
            return $data;
        }

        $data = [
            'status'                 => 200,
            'messagesContainer'      => view('backend.pages.aiChat.inc.messages-container', compact('conversation'))->render(),
        ];
        return $data;
    }

    # get conversations
    public function getConversations(Request $request)
    {
        $conversationsQuery = AiChat::where('ai_chat_category_id', (int) $request->ai_chat_category_id)->where('user_id', auth()->user()->id)->latest('updated_at');

        $chatList = $conversationsQuery->get();
        $conversation = $conversationsQuery->first();

        $data = [
            'status'                 => 200,
            'chatRight'      => view('backend.pages.aiChat.inc.chat-right', compact('conversation', 'chatList', 'conversation'))->render(),
        ];
        return $data;
    }

    # SEND IN EMAIL
    public function sendInEmail(Request $request)
    {
        if ($request->email == null) {
            flash(localize('Please type an email'))->error();
            return back();
        }

        $conversation = AiChat::findOrFail((int) $request->conversation_id);
        if (is_null($conversation)) {
            flash(localize('Chat not found'))->error();
            return back();
        }

        try {
            $array['view'] = 'emails.chat';
            $array['from'] = env('MAIL_FROM_ADDRESS');
            $array['subject'] = $conversation->title;
            $array['conversation'] = $conversation;
            $array['messages'] = $conversation->messages;

            Mail::to($request->email)->queue(new EmailManager($array));
            flash(localize('Chat successfully sent to email'))->success();
        } catch (\Throwable $th) {
            dd($th);
            flash(localize('Something went wrong'))->error();
        }
        return back();
    }
}
