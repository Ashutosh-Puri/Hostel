<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    public function recordAttendance(Request $request)
    {
        $student = Student::where('rfid', $request->rfid)->first();

        if (!$student) {
            dd('Invalid RFID tag.');
            return redirect()->back()->with('error', 'Invalid RFID tag.');
        }

        $attendance = new Attendance();
        $attendance->student_id = $student->id; // Assuming you have a student_id field
        $attendance->entry_time = now();
        $attendance->save();
        dd('Attendance recorded successfully.');
        return redirect()->back()->with('success', 'Attendance recorded successfully.');
    }

}


