<?php

namespace App\Livewire\Backend\StudentNightOut;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\NightOut;
use App\Models\Admission;
use App\Models\Allocation;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class AllStudentNightOut extends Component
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
    public $reason;
    public $going_date;
    public $comming_date;
    public $allocation_id;
    public $status;
    public $c_id;
    public $current_id;
    public $student_id;

    protected function rules()
    {
        return [
            'going_date' => ['required', 'date'],
            'comming_date' => ['required', 'date'],
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
        $this->going_date=null;
        $this->comming_date=null;
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
        $nightout= new NightOut;
        if($nightout){
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
                        $nightout->allocation_id = $allocation->id;
                        $nightout->reason = $validatedData['reason'];
                        $nightout->going_date =  $validatedData['going_date'];
                        $nightout->comming_date = $validatedData['comming_date'];
                        $nightout->save();
                        $this->resetinput();
                        $this->setmode('all');
                        $this->dispatch('alert',type:'success',message:'Student Night Out Entry Created Successfully !!');  
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
            }else{
                $this->dispatch('alert',type:'error',message:'Current Year Not Found !!');  
            }
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(NightOut $nightout)
    {
        if($nightout){
            $this->current_id=$nightout->id;
            $this->c_id=$nightout->id;
            $this->allocation_id=$nightout->allocation_id;
            $this->reason = $nightout->reason;
            $this->going_date = date('Y-m-d', strtotime($nightout->going_date));
            $this->comming_date =date('Y-m-d', strtotime($nightout->comming_date));
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(NightOut $nightout)
    {
        $validatedData = $this->validate();
        if($nightout){
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
                        $nightout->allocation_id = $allocation->id;
                        $nightout->reason = $validatedData['reason'];
                        $nightout->going_date = $validatedData['going_date'];
                        $nightout->comming_date =$validatedData['comming_date'];
                        $nightout->update();
                        $this->resetinput();
                        $this->setmode('all');
                        $this->dispatch('alert',type:'success',message:'Student Night Out Entry Updated Successfully !!');  
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
            else{
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

    public function softdelete(NightOut $nightout)
    {
        if($nightout){
            $nightout->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Local Register Entry Deleted Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }
    public function restore($id)
    {
        $nightout = NightOut::withTrashed()->find($id);
        if($nightout){
            $nightout->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Local Register Entry Restored Successfully !!'); 
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }
    public function delete()
    {
        $nightout = NightOut::withTrashed()->find($this->delete_id);
        if($nightout){
            $nightout->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Student Local Register Entry Deleted Successfully !!'); 
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(NightOut $nightout)
    {
        if($nightout->status==1)
        {   
            $nightout->status=0;
        }else
        {
            $nightout->status=1;
        }
        $nightout->update();
    }

    public function render()
    {   
        if($this->mode=='all')
        {
            $this->resetinput();
        }
        $this->student_id=Auth::guard('admin')->user()->id;
        $night_out = NightOut::query()->with('allocation.admission.class', 'allocation.admission.student', 'allocation.admission.academicyear')
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
    

        return view('livewire.backend.student-night-out.all-student-night-out',compact('night_out'))->extends('layouts.admin.admin')->section('admin');
    }

}
