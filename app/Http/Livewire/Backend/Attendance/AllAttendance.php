<?php

namespace App\Http\Livewire\Backend\Attendance;

use App\Models\Student;
use Livewire\Component;
use App\Models\Attendance;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class AllAttendance extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
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
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Attendence Recorded Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }

    }

    public function edit($id)
    {
        $this->current_id=$id;
        $attendance = Attendance::find($id);
        if($attendance){
            $this->c_id=$attendance->id;
            $this->student_id=$attendance->student_id;
            $this->rfid=$attendance->rfid;
            $this->setmode('edit');
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function update($id)
    {
        $validatedData = $this->validate();
        $attendance = Attendance::find($id);
        if($attendance){
            $attendance->student_id = $validatedData['student_id'];
            $attendance->rfid = $validatedData['rfid'];
            $attendance->entry_time = now();
            $attendance->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Attendance Updated Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('delete-confirmation');
    }

    public function softdelete($id)
    {
        $attendance = Attendance::find($id);
        if($attendance){
            $attendance->delete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Attendance Deleted Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function restore($id)
    {
        $attendance = Attendance::withTrashed()->find($id);
        if($attendance){
            $attendance->restore();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Attendance Restored Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function delete()
    {
        $attendance = Attendance::withTrashed()->find($this->delete_id);
        if($attendance){
            $attendance->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Attendance Deleted Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }


    public function render()
    {
        $students=Student::where('status',0)->get();


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
