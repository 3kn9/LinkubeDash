<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TelegramBotController extends Controller
{
    public function callback(Request $request){
        dump($request->all());
    }
}
