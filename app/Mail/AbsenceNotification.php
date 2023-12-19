<?php

namespace App\Mail;

use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Contracts\Queue\ShouldQueue;

class AbsenceNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $student;

    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    public function build()
    {
        return $this->view('emails.absence-notification')->with(['student' => $this->student]);
    }

}
