<?php

namespace App\Http\Livewire\Frontend\StudentPayFine;

use Livewire\Component;
use App\Models\StudentFine;
use Livewire\WithPagination;

class StudentPayFine extends Component
{   
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $per_page = 10;

    public function render()
    {
        $student_fines = StudentFine::where('student_id',auth()->guard('student')->user()->id)->orderBy('academic_year_id', 'DESC')->paginate($this->per_page);
   
        return view('livewire.frontend.student-pay-fine.student-pay-fine',compact('student_fines'))->extends('layouts.student.student')->section('student');
    }
}
