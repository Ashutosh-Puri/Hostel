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

    public $messageBody ,$name;
    /**
     * Create a new message instance.
     */
    public function __construct($messageBody ,$name)
    {
        $this->messageBody=$messageBody;
        $this->name=$name;
    }


    public function build()
    {
        return $this->subject('Enquiry Reply')->markdown('emails.enquiry_reply')->with('messageBody','name', $this->messageBody ,$this->name);
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
