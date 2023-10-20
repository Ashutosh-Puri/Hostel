<?php

namespace App\Notifications;

use Vonage\SMS\Message\SMS;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class SendSMSNotification extends Notification
{
    use Queueable;

    public $message;

    public function __construct($message)
    {
        $this->message=$message; 
    }

    public function via($notifiable)
    {   
        return ['vonage', 'mail', 'database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)->line($this->message)->line('Thank you for using our application!');
    }

    public function toDatabase($notifiable)
    {
        return [ 'message' => $this->message,];
    }

    public function toVonage($notifiable)
    {   
        return new SMS(env('VONAGE_CONTRY_CODE').$notifiable->mobile, config('services.vonage.sms_from'),$this->message);
    }

}
