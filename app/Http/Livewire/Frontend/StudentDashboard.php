<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Bed;
use App\Models\Student;
use Livewire\Component;

class StudentDashboard extends Component
{
    public function render()
    {
        $student = auth()->user();
        // $student = Student::find(65);
        if($student->getBedId())
        {
            $bed = Bed::find($student->getBedId());

        }else{
            $bed = null;
        }
        return view('livewire.frontend.student-dashboard',compact('bed','student'))->extends('layouts.student.student')->section('student');
    }
}
