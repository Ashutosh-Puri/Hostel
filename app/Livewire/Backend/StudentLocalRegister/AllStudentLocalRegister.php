<?php

namespace App\Livewire\Backend\StudentLocalRegister;

use Carbon\Carbon;
use App\Models\Student;
use Livewire\Component;
use App\Models\Admission;
use App\Models\Allocation;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use App\Models\LocalRegister;
use App\Models\StudentLocalRegister;
use Illuminate\Support\Facades\Auth;

class AllStudentLocalRegister extends Component
{   
    use WithPagination;
    
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $year = '';
    public $class_name = '';
    public $student_name='';
    public $per_page = 10;
    public $mode='all';
    public $reason;
    public $entry_time;
    public $exit_time;
    public $allocation_id;
    public $status;
    public $c_id;
    public $current_id;
    public $student_id;

    protected function rules()
    {
        return [
            'entry_time' => ['required', 'date_format:H:i'],
            'exit_time' => ['required', 'date_format:H:i'],
            'reason' => ['required','string','max:2000'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->student_id=null;
        $this->reason=null;
        $this->entry_time=null;
        $this->exit_time=null;
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
        $studentlocalregister= new LocalRegister;
        if($studentlocalregister){
            $currentYear = Carbon::now()->year;
            $aid=AcademicYear::where('year',$currentYear)->first()->id;
            if($aid)
            {
                $admission = Admission::where('academic_year_id',$aid)->where('student_id', $this->student_id)->latest()->first();
                if($admission)
                {
                    $allocation=Allocation::where('admission_id', $admission->id)->first();
                    if($allocation)
                    {   
                        if(isset($allocation->bed_id))
                        {
                            $studentlocalregister->allocation_id = $allocation->id;
                            $studentlocalregister->reason = $validatedData['reason'];
                            $studentlocalregister->entry_time = now()->format('Y-m-d') . ' ' . $validatedData['entry_time'];
                            $studentlocalregister->exit_time = now()->format('Y-m-d') . ' ' . $validatedData['exit_time'];
                            $studentlocalregister->save();
                            $this->resetinput();
                            $this->setmode('all');
                            $this->dispatch('alert',type:'success',message:'Student Local Register Entry Created Successfully !!');
                        }else
                        {
                            $this->dispatch('alert',type:'error',message:'Bed Not Allocated Yet !!');
                        }
                    }
                    else
                    {
                        $this->dispatch('alert',type:'error',message:'Allocation Not Found !!');  
                    }
                }
                else
                {
                    $this->dispatch('alert',type:'error',message:'Admission Not Found !!');  
                }
            }
            else
            {
                $this->dispatch('alert',type:'error',message:'Current Year Not Found !!');  
            }
        }
        else
        {
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(LocalRegister $studentlocalregister)
    {
        if($studentlocalregister){
            $this->student_id=$studentlocalregister->allocation->admission->student_id;
            $this->current_id=$studentlocalregister->id;
            $this->c_id=$studentlocalregister->id;
            $this->allocation_id=$studentlocalregister->allocation_id;
            $this->reason = $studentlocalregister->reason;
            $this->entry_time =date('H:i', strtotime($studentlocalregister->entry_time)) ;
            $this->exit_time = date('H:i', strtotime($studentlocalregister->exit_time));
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(LocalRegister $studentlocalregister)
    {
        $validatedData = $this->validate();
        if($studentlocalregister){
            $currentYear = Carbon::now()->year;
            $aid=AcademicYear::where('year',$currentYear)->first()->id;
            if($aid)
            {
                $admission = Admission::where('academic_year_id',$aid)->where('student_id', $this->student_id)->latest()->first();
                if($admission)
                {
                    $allocation=Allocation::where('admission_id', $admission->id)->first();
                    if($allocation)
                    {   
                        if(isset($allocation->bed_id))
                        {
                            $studentlocalregister->allocation_id = $allocation->id;
                            $studentlocalregister->reason = $validatedData['reason'];
                            $studentlocalregister->entry_time = now()->format('Y-m-d') . ' ' . $validatedData['entry_time'];
                            $studentlocalregister->exit_time = now()->format('Y-m-d') . ' ' . $validatedData['exit_time'];
                            $studentlocalregister->update();
                            $this->resetinput();
                            $this->setmode('all');
                            $this->dispatch('alert',type:'success',message:'Student Local Register Entry Updated Successfully !!');
                        }else
                        {
                            $this->dispatch('alert',type:'error',message:'Bed Not Allocated Yet !!');
                        }
                    }
                    else
                    {
                        $this->dispatch('alert',type:'error',message:'Allocation Not Found !!');  
                    }
                }
                else
                {
                    $this->dispatch('alert',type:'error',message:'Admission Not Found !!');  
                }
            }
            else
            {
                $this->dispatch('alert',type:'error',message:'Current Year Not Found !!');  
            }
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(LocalRegister $studentlocalregister)
    {
        if($studentlocalregister){
            $studentlocalregister->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Local Register Entry Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }
    public function restore($id)
    {
        $studentlocalregister = LocalRegister::withTrashed()->find($id);
        if($studentlocalregister){
            $studentlocalregister->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Local Register Entry Restored Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }
    public function delete()
    {
        $studentlocalregister = LocalRegister::withTrashed()->find($this->delete_id);
        if($studentlocalregister){
            $studentlocalregister->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Local Register Entry Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(LocalRegister $studentlocalregister)
    {
        if($studentlocalregister->status==1)
        {   
            $studentlocalregister->status=0;
        }else
        {
            $studentlocalregister->status=1;
        }
        $studentlocalregister->update();
    }

    public function render()
    {   
        if($this->mode=='all')
        {
            $this->resetinput();
            $students=null;
        }else
        {
            $students=Student::select('id','name','username')->where('status',0)->orderBy('name',"ASC")->get();
        }

        $local_registers = LocalRegister::query()->with('allocation.admission.class', 'allocation.admission.student', 'allocation.admission.academicyear')
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

        return view('livewire.backend.student-local-register.all-student-local-register',compact('students','local_registers'))->extends('layouts.admin.admin')->section('admin');
    }
}
