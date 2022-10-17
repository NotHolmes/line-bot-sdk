<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Score;
use Illuminate\Http\Request;
use LINE\LINEBot\MessageBuilder\MultiMessageBuilder;
use LINE\LINEBot\MessageBuilder\StickerMessageBuilder;
use LINE\LINEBot\MessageBuilder\TextMessageBuilder;

class CreateController extends Controller
{
    public function store(Request $request){
        $score = new Score();
        $score->name = $request->input('name');
        $score->score = $request->input('score');
        $score->save();

        if($request->input('userId'))
            $userId = $request->input('userId');
        else
            $userId = 'U0517f135abb4a08f5859764bdfdf2e54';

        $httpClient = new \LINE\LINEBot\HTTPClient\CurlHTTPClient(env('LINE_BOT_CHANNEL_ACCESS_TOKEN'));
        $bot = new \LINE\LINEBot($httpClient, ['channelSecret' => env('LINE_BOT_CHANNEL_SECRET')]);

        $multiMessageBuilder = new MultiMessageBuilder();
        $multiMessageBuilder->add(new TextMessageBuilder(json_encode($score)));
        $response = $bot->pushMessage($userId, $multiMessageBuilder);
    }
}
