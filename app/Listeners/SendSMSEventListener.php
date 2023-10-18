<?php

namespace App\Listeners;

use App\Events\SendSMSEvent;
use Illuminate\Queue\InteractsWithQueue;
use App\Notifications\SendSMSNotification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendSMSEventListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SendSMSEvent $event): void
    { 
        $student = $event->student;
        $message = $event->message;
        $student->notify(new SendSMSNotification($message));
    }
}
