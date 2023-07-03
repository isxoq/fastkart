<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TelegramController extends Controller
{
    public function sendZayavka(Request $request)
    {

        $text = view("page.partials._zayavka",[
            'data'=>$request->all()
        ])->render();

        Http::post("https://api.telegram.org/bot" . config("app.bot_token") . "/sendMessage", [
            "chat_id" => config("app.zayavka_group"),
            "parse_mode" => "html",
            "text" => $text
        ]);
    }
}
