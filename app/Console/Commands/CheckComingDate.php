<?php

namespace App\Console\Commands;

use Vonage\Client;
use App\Models\Student;
use App\Models\NightOut;
use Vonage\SMS\Message\SMS;
use App\Events\SendSMSEvent;
use Illuminate\Console\Command;
use Vonage\Client\Credentials\Basic;


class CheckComingDate extends Command
{
    protected $signature = 'check-coming-date';
    protected $description = 'Check if the current date exceeds the coming date and send SMS';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {   
        $nightout = NightOut::where('status', 1)->first();

        if ($nightout && $nightout->allocation && $nightout->allocation->admission && $nightout->allocation->admission->student_id) {
            $comingDate = date('Y-m-d', strtotime($nightout->comming_date));
            $currentDate = now()->format('Y-m-d');

            if ($currentDate > $comingDate) {
                $student = Student::find($nightout->allocation->admission->student_id);
                event(new SendSMSEvent($student, 'Your coming date has passed. Please check in!'));
            }
        } 
    }

    private function sendSms($message, $student_id)
    {   
        $student = Student::find($student_id);

        if ($student) 
        {

            $basic = new Basic(env('VONAGE_API_KEY'), env('VONAGE_API_SECRET'));
            $client= new Client($basic);

            try {

                $response = $client->sms()->send(
                    new SMS(env('VONAGE_CONTRY_CODE').$student->mobile, env('APP_NAME'), $message)
                );

                $message = $response->current();
            
                if ($message->getStatus() == 0) {
                    $this->info('SMS notification sent.');
                    dd('sms sent:',$message);
                } else {
                    $this->error('Failed to send SMS notification. Status: ' . $message->getStatus());
                    dd('sms Fail');
                }
            } catch (\Exception $e) {
                $this->error('Error sending SMS: ' . $e->getMessage());
                dd('sms error');
            }
        }
    }
}
