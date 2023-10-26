<?php

namespace App\Http\Livewire\Guestend\RecentStudent;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RecentStudent extends Component
{
    public $student=null;
    public $status = null;
    public $valid = null;
    public function render()
    {   
  
        if($id=DB::table('current_user')->find(1))
        {   
            $this->student=Student::find($id->student_id); 
            $this->valid =$id->status;
        }
        return view('livewire.guestend.recent-student.recent-student')->extends('layouts.app')->section('content');
    }
}
