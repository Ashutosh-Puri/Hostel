<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnquiryReply extends Mailable
{
    use Queueable, SerializesModels;

    public $messageBody;
    /**
     * Create a new message instance.
     */
    public function __construct($messageBody)
    {
        $this->messageBody=$messageBody;
    }


    public function build()
    {
        return $this->subject('Enquiry Reply')
                    ->markdown('emails.enquiry_reply')
                    ->with('messageBody', $this->messageBody);
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
