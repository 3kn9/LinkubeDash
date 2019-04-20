<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptchaController extends Controller
{
    public function processToken(Request $request)
    {
        $url = 'https://www.recaptcha.net/recaptcha/api/siteverify';
        $data = [
            'secret' => config('services.recaptcha.secret_key'),
            'response' => $request['token']
        ];

        $options = array(
            'http' => array(
                'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
                'method'  => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context  = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        if ($result === FALSE) { /* Handle error */ }

        dump($result);
    }
}
