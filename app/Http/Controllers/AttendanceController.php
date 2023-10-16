<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function recordAttendance(Request $request)
    {   
        $rfid =(int)$request->input('rfid');
        $secrate_key = $request->input('secrate_key');
        if(env('RFID_SECRET')===$secrate_key)
        {
            if ($rfid) {
                $student = Student::where('rfid',$rfid)->first();
                if ($student) {
                    $attendance = new Attendance();
                    $attendance->student_id = $student->id;
                    $attendance->rfid = $rfid;
                    $attendance->entry_time = now();
                    $attendance->save();
                    return response("Attendance Recoreded Successfully.",200)->header('Content-Type', 'text/plain');
                } else {
                    return response("INVALID RFID",404)->header('Content-Type', 'text/plain');
                }
            } 
        }else {
            return response("Un Athorized Access",403)->header('Content-Type', 'text/plain');
        }
    }
}


