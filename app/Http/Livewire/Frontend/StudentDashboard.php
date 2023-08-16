<?php

namespace App\Http\Livewire\Frontend;

use Livewire\Component;

class StudentDashboard extends Component
{
    public function render()
    {
        return view('livewire.frontend.student-dashboard')->extends('layouts.student.student')->section('student');
    }
}
