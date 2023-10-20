<?php

namespace App\Console\Commands;

use App\Models\Student;
use App\Events\SendSMSEvent;
use App\Models\LocalRegister;
use Illuminate\Console\Command;

class CheckLocalRegister extends Command
{

    protected $signature = 'check-local-register';
    protected $description = 'Check if the current time exceeds the entry time and send SMS';

    public function handle()
    {  
        $localentrys = LocalRegister::where('status', 1)->get();
       
        foreach ($localentrys as $localentry) {
            
            $entrytime = $localentry->entry_time;
            $currenttime = now()->format('Y-m-d H:m:s');

            
            if ($currenttime >= $entrytime) {
                $student = Student::find($localentry->allocation->admission->student_id);
                event(new SendSMSEvent($student, 'Your Entry Time has passed. Please check in!'));
                $localentry->status = 2;
                $localentry->save();
            }
        }
    
        if ($localentrys->isEmpty()) {
            Log::info('No Local Register Entry Found with status Approved.');
        }
    }
}
