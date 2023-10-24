<?php

namespace App\Http\Livewire\Backend\StudentComeFromHome;

use Livewire\Component;
use App\Models\Admission;
use App\Models\Allocation;
use App\Models\ComeFromHome;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class AllStudentComeFromHome extends Component
{   
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $year = '';
    public $class_name = '';
    public $student_name='';
    public $per_page = 10;
    public $mode='all';
    public $come_time;
    public $allocation_id;
    public $status;
    public $c_id;
    public $current_id;
    public $student_id;

    protected function rules()
    {
        return [
            'come_time' => ['required', 'date_format:H:i'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->year=null;
        $this->class_name=null;
        $this->student_name=null;
        $this->student_id=null;
        $this->come_time=null;
        $this->allocation_id=null;
        $this->status=null;
        $this->c_id=null;
        $this->current_id=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    public function save()
    {
        $validatedData = $this->validate();
        $studentlocalregister= new ComeFromHome;
        if($studentlocalregister){
            $admission = Admission::where('student_id', $this->student_id)->latest()->first();
            $allocation=Allocation::where('admission_id', $admission->id)->first();
            $studentlocalregister->allocation_id = $allocation->id;
            $studentlocalregister->come_time = now()->format('Y-m-d') . ' ' . $validatedData['come_time'];
            $studentlocalregister->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Come From Home Entry Created Successfully !!"
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
        $studentlocalregister = ComeFromHome::find($id);
        if($studentlocalregister){
            $this->c_id=$studentlocalregister->id;
            $this->allocation_id=$studentlocalregister->allocation_id;
            $this->come_time =date('H:i', strtotime($studentlocalregister->come_time)) ;
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
        $studentlocalregister = ComeFromHome::find($id);
        if($studentlocalregister){
            $admission = Admission::where('student_id', $this->student_id)->latest()->first();
            $allocation=Allocation::where('admission_id', $admission->id)->first();
            $studentlocalregister->allocation_id = $allocation->id;
            $studentlocalregister->come_time = now()->format('Y-m-d') . ' ' . $validatedData['come_time'];
            $studentlocalregister->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Come From Home Entry Updated Successfully !!"
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
        $studentlocalregister = ComeFromHome::find($id);
        if($studentlocalregister){
            $studentlocalregister->delete();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Come From Home Entry Deleted Successfully !!"
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
        $studentlocalregister = ComeFromHome::withTrashed()->find($id);
        if($studentlocalregister){
            $studentlocalregister->restore();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Come From Home Entry Restored Successfully !!"
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
        $studentlocalregister = ComeFromHome::withTrashed()->find($this->delete_id);
        if($studentlocalregister){
            $studentlocalregister->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Come From Home Entry Deleted Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

    public function status($id)
    {
        $status = ComeFromHome::find($id);
        if($status->status==1)
        {   
            $status->status=0;
        }else
        {
            $status->status=1;
        }
        $status->update();
    }

    public function render()
    {   
        $this->student_id=Auth::guard('admin')->user()->id;

        $come_from_home = ComeFromHome::query()->with('allocation.admission.class', 'allocation.admission.student', 'allocation.admission.academicyear')
        ->when($this->year, function ($query) {
            $query->whereHas('allocation.admission.academicyear', function ($subQuery) {
                $subQuery->where('year', 'like', '%' . $this->year . '%');
            });
        })->when($this->class_name, function ($query) {
            $query->whereHas('allocation.admission.class', function ($subQuery) {
                $subQuery->where('name', 'like', '%' . $this->class_name . '%');
            });
        })->when($this->student_name, function ($query) {
            $query->whereHas('allocation.admission.student', function ($subQuery) {
                $subQuery->where('name', 'like', '%' . $this->student_name . '%');
            });
        })->withTrashed()->paginate($this->per_page);
    

        return view('livewire.backend.student-come-from-home.all-student-come-from-home',compact('come_from_home'))->extends('layouts.admin.admin')->section('admin');
    }
}
