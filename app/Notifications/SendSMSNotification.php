<?php

namespace App\Notifications;
use Vonage\Client;
use Vonage\SMS\Message\SMS;
use Vonage\Client\Credentials\Basic;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SendSMSNotification extends Notification
{
    use Queueable;
    public $message;

    public function __construct($message)
    {
        $this->message = $message;
    }

    public function toSms($notifiable)
    {
        return (new NexmoMessage())
            ->content($this->message);
    }

    // Define the "via" method to specify the channel(s).
    public function via($notifiable)
    {
        return ['sms'];
    }
}
