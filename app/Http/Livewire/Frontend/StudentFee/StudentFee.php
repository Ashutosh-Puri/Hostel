<?php

namespace App\Http\Livewire\Frontend\StudentFee;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\StudentPayment;

class StudentFee extends Component
{   
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $per_page = 10;

    public function render()
    {
        $student_payments = StudentPayment::where('student_id',auth()->guard('student')->user()->id)->orderBy('academic_year_id', 'DESC')->paginate($this->per_page);
   
        return view('livewire.frontend.student-fee.student-fee',compact('student_payments'))->extends('layouts.student.student')->section('student');
    }
}
