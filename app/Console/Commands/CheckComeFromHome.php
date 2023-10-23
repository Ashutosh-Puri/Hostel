<?php

namespace App\Console\Commands;

use App\Models\Student;
use App\Events\SendSMSEvent;
use App\Models\ComeFromHome;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CheckComeFromHome extends Command
{

    protected $signature = 'check-come-from-home';
    protected $description = 'Check if the current time exceeds the entry time and send SMS';

    public function handle()
    {  
        $comefromhomes = ComeFromHome::where('status', 1)->get();
       
        foreach ($comefromhomes as $comefromhome) {
            
            $cometime = $comefromhome->come_time;
            $currenttime = now()->format('Y-m-d H:m:s');

            if ($currenttime >= $cometime) {
                $student = Student::find($comefromhome->allocation->admission->student_id);
                event(new SendSMSEvent($student, 'Your Come From Home Entry Time has passed. Please check in!'));
                $comefromhome->status = 2;
                $comefromhome->save();
            }
        }
    
        if ($comefromhomes->isEmpty()) {
            Log::info('No Come From Home Entry Found with status Approved.');
        }
    }
}
