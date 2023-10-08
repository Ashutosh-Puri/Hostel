<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PaymentSuccessNotification extends Notification
{
    use Queueable;
    private $response;

    public function __construct($response)
    {
        $this->response=$response;
    }

    public function via(object $notifiable): array
    {
        return ['database','mail'];
    }

    public function toMail(object $notifiable): MailMessage
    {   
        $paymentData = [
            'payment_id' => $this->response['id'],
            'payment_method'=> $this->response['method'],
            'payment_amount'=> $this->response['amount']/100,
            'payment_status'=> $this->response['status'],
        ];

        return (new MailMessage)
        ->line('Payment Successful!')
        ->line('')
        ->line('Your Payment Has Been Successfully Processed.')
        ->line('')
        ->line('Payment Details:')
        ->line('Payment ID: ' . $paymentData['payment_id'])
        ->line('Payment Method: ' . $paymentData['payment_method'])
        ->line('Payment Amount: ' . number_format($paymentData['payment_amount'], 2).' Rs.')
        ->line('Payment Status: ' . $paymentData['payment_status'])
        ->line('')
        ->line('Thank You For Your Payment!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'payment_id'=>$this->response['id'] ,
            'payment_method'=> $this->response['method'],
            'payment_amount'=> $this->response['amount']/100,
            'payment_status'=> $this->response['status'],
        ];
    }
}
