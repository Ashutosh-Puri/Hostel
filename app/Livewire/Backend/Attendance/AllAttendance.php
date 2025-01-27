<?php

namespace App\Livewire\Backend\Attendance;

use App\Models\Student;
use Livewire\Component;
use App\Models\Attendance;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class AllAttendance extends Component
{
    use WithPagination;
    
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $s_name = '';
    public $s_rfid = '';
    public $sortby_feild='id';
    public $sortby_order="DESC";
    public $per_page = 10;
    public $mode='all';
    public $student_id;
    public $current_id;
    public $rfid;
    public $c_id;
    public $attendanceArray=[];


    protected function rules()
    {
        return [
            'rfid' => ['required', 'string', 'max:255','unique:students,rfid'],
            'student_id'=>['required','integer', Rule::exists(Student::class, 'id')],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }
    public function clear()
    {
        $this->sortby_feild='id';
        $this->sortby_order='DESC';
        $this->s_name = null;
        $this->s_rfid = null;
    }

    public function resetinput()
    {
        $this->c_id=null;
        $this->Student_id=null;
        $this->rfid=null;
        $this->current_id=null;
    }

    public function save()
    {
        $validatedData = $this->validate();
        $attendance= new Attendance;
        if($attendance){
            $attendance->student_id = $validatedData['student_id'];
            $attendance->rfid = $validatedData['rfid'];
            $attendance->entry_time = now();
            $attendance->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Attendence Recorded Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }

    }

    public function edit(Attendance $attendance)
    {
        if($attendance){
            $this->current_id=$attendance->id;
            $this->c_id=$attendance->id;
            $this->student_id=$attendance->student_id;
            $this->rfid=$attendance->rfid;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(Attendance $attendance)
    {
        $validatedData = $this->validate();
        if($attendance){
            $attendance->student_id = $validatedData['student_id'];
            $attendance->rfid = $validatedData['rfid'];
            $attendance->entry_time = now();
            $attendance->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Attendance Updated Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(Attendance $attendance)
    {
        if($attendance){
            $attendance->delete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Attendance Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $attendance = Attendance::withTrashed()->find($id);
        if($attendance){
            $attendance->restore();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Attendance Restored Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $attendance = Attendance::withTrashed()->find($this->delete_id);
        if($attendance){
            $attendance->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Attendance Deleted Successfully !');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }


    public function render()
    {   
        if($this->mode!=='all')
        {
            $students=Student::where('status',0)->get();
        }
        else{
            $this->resetinput();
            $students=null;
        }
        


        $attendanceQuery = Attendance::orderBy($this->sortby_feild, $this->sortby_order);

        if ($this->s_name) {
            $attendanceQuery->whereHas('Student', function ($q) {
                $q->where('status', 0)->where('name', 'like', '%' . $this->s_name . '%');
            });
        }

        if ($this->s_rfid) {
            $attendanceQuery->where('rfid', 'like', '%' . $this->s_rfid . '%');
        }
        $attendance = $attendanceQuery->withTrashed()->paginate($this->per_page);

        $this->attendanceArray['id']=  $attendanceQuery->pluck('id')->all();

        return view('livewire.backend.attendance.all-attendance',compact('attendance','students'))->extends('layouts.admin.admin')->section('admin');
    }
}
