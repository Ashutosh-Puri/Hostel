<?php

namespace App\Notifications\Channels;
use Vonage\Client;
use Vonage\SMS\Message\SMS;
use App\Notifications\SendSMSNotification;


class SmsChannel
{
    public function send($notifiable, SendSMSNotification $notification)
    {
        $vonage = new Client(new Client\Credentials\Basic(
            config('services.vonage.key'),
            config('services.vonage.secret')
        ));
        $message = $notification->toVonage($notifiable);

        $vonage->sms()->send($message);
    }
}
