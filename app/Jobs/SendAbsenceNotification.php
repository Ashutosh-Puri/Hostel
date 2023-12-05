<?php

namespace App\Jobs;

use Mail;
use App\Models\Student;
use Illuminate\Bus\Queueable;
use App\Mail\AbsenceNotification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class SendAbsenceNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $student;
    /**
     * Create a new job instance.
     */
    public function __construct(Student $student)
    {
        $this->student = $student;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $parentEmail = $this->student->parent_email;

        // Check if the email address is valid
        if (filter_var($parentEmail, FILTER_VALIDATE_EMAIL)) {
            Mail::to($parentEmail)->send(new AbsenceNotification($this->student));
        } else {
            // Log an error or handle the invalid email address appropriately
            \Log::error("Invalid email address: $parentEmail");
        }
    }
}
