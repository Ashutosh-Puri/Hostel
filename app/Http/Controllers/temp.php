<?php

namespace App\Http\Controllers;


use Mpdf\Mpdf;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Vonage\Client;
use Vonage\SMS\Message\SMS;



class temp extends Controller
{
   

    public function sms()
    {
        $vonage = new Client(new \Vonage\Client\Credentials\Basic(
            env('VONAGE_API_KEY'),
            env('VONAGE_API_SECRET')
        ));

        $message = new SMS(env('VONAGE_SMS_FROM'), '1234567890', 'test');

        $vonage->sms()->send($message);

        return "SMS sent successfully!";
    }



}
