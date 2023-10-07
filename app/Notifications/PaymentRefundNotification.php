<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PaymentRefundNotification extends Notification
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
            'refund_id' => $this->response['id'],
            'payment_id' => $this->response['payment_id'],
            'refund_amount'=> $this->response['amount']/100,
            'refund_status'=> $this->response['status'],
        ];

        return (new MailMessage)
        ->line('Payment Refunded!')
        ->line('')
        ->line('Your Payment Has Been Refunded.')
        ->line('')
        ->line('Payment Details:')
        ->line('Refund ID: ' . $paymentData['refund_id'])
        ->line('Payment ID: ' . $paymentData['payment_id'])
        ->line('Refund Amount: ' . number_format($paymentData['refund_amount'], 2).' Rs.')
        ->line('Refund Status: ' . $paymentData['refund_status'])
        ->line('')
        ->line('Thank You!');
    }

    public function toArray(object $notifiable): array
    {
        return [
            'refund_id' => $this->response['id'],
            'payment_id' => $this->response['payment_id'],
            'refund_amount'=> $this->response['amount']/100,
            'refund_status'=> $this->response['status'],
        ];
    }
}
