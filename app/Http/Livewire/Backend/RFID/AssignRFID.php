<?php

namespace App\Http\Livewire\Backend\RFID;

use App\Models\Student;
use Livewire\Component;
use App\Models\Admission;
use Illuminate\Support\Facades\DB;

class AssignRFID extends Component
{   

    public $rfid;
    public $name;
    public $student_id;
    public $s_id;
    public $a_id;
    public $status=null;

    public function mount()
    {
        $this->status=1;
    }

    public function retry()
    {   
        $this->rfid=null;
        $this->status=1;
    }

    public function remove()
    {   
        $this->validate([
            's_id'=>['required'],
            'student_id'=>['required'],
        ]);
        $student=Student::find($this->student_id);
        if($student){
            $student->rfid=null;
            $student->update();
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"RFID Removed Successfully !!"
            ]);
        }
    }

    protected function rules()
    {
        return [
            'rfid' => ['required', 'string', 'max:255','unique:students,rfid'],
            'student_id' => ['required', 'integer', ]
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->rfid=null;
        $this->name=null;
        $this->student_id=null;
        $this->s_id=null;
        $this->a_id=null;
    }

    public function save()
    {
        $data=$this->validate();
        $student=Student::find($data['student_id']);
        if($student){
            $student->rfid=$data['rfid'];
            $student->update();
            DB::table('assign_rfid')->where('id', 1)->update(['rfid' => null]);
            $this->resetinput();
            $this->status=1;
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"RFID Assgined Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function fetch()
    {   
        if($this->rfid){
            $this->status=0;
        }else
        {   
            if($rfid=DB::table('assign_rfid')->find(1))
            {
                $this->rfid=$rfid->rfid;  
            }
        }
    }

    public function render()
    {   
        if($this->s_id)
        {
            $student=Student::find($this->s_id);
            if($student)
            {
                $this->student_id= $student->id;
                $this->name= $student->name==null?$student->username:$student->name;
            }else
            {
                $this->student_id=null;
                $this->name=null;
            }
        }

        if($this->a_id)
        {
            $admission=Admission::find($this->a_id);
            if($admission)
            {   
                $student=Student::find($admission->student_id);
                if($student)
                {
                    $this->s_id= $student->id;
                    $this->student_id= $student->id;
                    $this->name= $student->name==null?$student->username:$student->name;
                }else
                {
                    $this->student_id=null;
                    $this->name=null;
                }
            }
        }
        return view('livewire.backend.r-f-i-d.assign-r-f-i-d')->extends('layouts.admin.admin')->section('admin');
    }
}
