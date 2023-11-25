<?php

namespace App\Http\Livewire\Guestend\RecentStudent;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class RecentStudent extends Component
{
    public $student=null;
    public $status =1;
    public $valid = 2;
    public $old_id=null;
    protected $listeners = ['restart'];

    public function restart()
    {
        $this->valid=2;
        $this->status=1;
    }


    public function fetch()
    {   
        
        if($id=DB::table('current_user')->find(1))
        {   
            if($this->old_id !== $id->student_id)
            {
                $this->old_id=$id->student_id;

                $this->student=Student::find($id->student_id); 
                $this->valid =$id->status;
    
                if($this->student)
                {
                    $this->status=2;
                }
            }
        }
        
    }

    public function render()
    {   
        return view('livewire.guestend.recent-student.recent-student')->extends('layouts.guest.guest')->section('guest');
    }
}
