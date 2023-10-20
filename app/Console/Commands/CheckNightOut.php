<?php

namespace App\Console\Commands;

use App\Models\Student;
use App\Models\NightOut;
use App\Events\SendSMSEvent;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckNightOut extends Command
{

    protected $signature = 'check-night-out';
    protected $description = 'Check if the current date exceeds the coming date and send SMS';

    public function handle()
    {  
        $nightouts = NightOut::where('status', 1)->get();
        foreach ($nightouts as $nightout) {
            $comingDate = date('Y-m-d', strtotime($nightout->comming_date));
            $currentDate = now()->format('Y-m-d');
    
            if ($currentDate > $comingDate) {
                $student = Student::find($nightout->allocation->admission->student_id);
    
                event(new SendSMSEvent($student, 'Your coming date has passed. Please check in!'));

                $nightout->status = 2;
                $nightout->save();
            }
        }
    
        if ($nightouts->isEmpty()) {
            Log::info('No Night Outs Found with status Approved.');
        }
    }
}
