<?php

namespace App\Http\Controllers\Backend\Attendance;

use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AttendanceController extends Controller
{
    public function recordAttendance(Request $request)
    {   
        $rfid = (int)$request->input('rfid');
        $secrate_key = $request->input('secrate_key');
        
        if (env('RFID_SECRET') === $secrate_key) {
            if ($rfid) {
                $student = Student::where('rfid', $rfid)->first();
                
                if ($student) {
                    $existingEntry = Attendance::where('student_id', $student->id)->whereDate('entry_time', today())->whereNull('exit_time')->latest()->first();
                    if ($existingEntry) {
                        $existingEntry->exit_time = now();
                        $existingEntry->save();
                    } else {
                        $attendance = new Attendance();
                        $attendance->student_id = $student->id;
                        $attendance->rfid = $rfid;
                        $attendance->entry_time = now();
                        $attendance->save();
                    }
                    
                    DB::table('current_user')->updateOrInsert( ['id' => 1], ['student_id' => $student->id, 'status' => 0, 'created_at' => now(), 'updated_at' => now()]);
                    
                    return response("Attendance Recorded Successfully.", 200)->header('Content-Type', 'text/plain');
                } else {
                    DB::table('current_user')->updateOrInsert( ['id' => 1], ['status' => 1, 'created_at' => now(), 'updated_at' => now()]);
                    DB::table('assign_rfid')->updateOrInsert( ['id' => 1], ['rfid' => $rfid, 'created_at' => now(), 'updated_at' => now()]);
                    return response("INVALID RFID", 404)->header('Content-Type', 'text/plain');
                }
            } 
        } else {
            return response("Unauthorized Access", 403)->header('Content-Type', 'text/plain');
        }
    }
    
}


