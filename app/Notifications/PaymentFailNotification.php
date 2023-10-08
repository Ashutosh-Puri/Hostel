<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentFailNotification extends Notification
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
            'payment_fail_description'=> $this->response['error_description'],
            'payment_fail_reason'=> $this->response['error_reason'],
        ];

        return (new MailMessage)
        ->line('Payment Failed!')
        ->line('')
        ->line('Your Payment Has Been Failed.')
        ->line('')
        ->line('Payment Details:')
        ->line('Payment ID: ' . $paymentData['payment_id'])
        ->line('Payment Method: ' . $paymentData['payment_method'])
        ->line('Payment Amount: ' . number_format($paymentData['payment_amount'], 2).' Rs.')
        ->line('Payment Failed Reason: ' . $paymentData['payment_fail_reason'])
        ->line('Payment Failed Description: ' . $paymentData['payment_fail_description'])
        ->line('Payment Status: ' . $paymentData['payment_status'])
        ->line('')
        ->line('Try Again !');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'payment_id'=>$this->response['id'] ,
            'payment_method'=> $this->response['method'],
            'payment_amount'=> $this->response['amount']/100,
            'payment_status'=> $this->response['status'],
            'payment_fail_description'=> $this->response['error_description'],
            'payment_fail_reason'=> $this->response['error_reason'],
        ];
    }
}
