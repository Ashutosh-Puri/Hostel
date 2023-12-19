<?php

namespace App\Livewire\Backend\StudentComeFromHome;

use Carbon\Carbon;
use App\Models\Student;
use Livewire\Component;
use App\Models\Admission;
use App\Models\Allocation;
use App\Models\AcademicYear;
use App\Models\ComeFromHome;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class AllStudentComeFromHome extends Component
{   
    use WithPagination;
    
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
        $comefromhome= new ComeFromHome;
        if($comefromhome){
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
                            $allocation=Allocation::where('admission_id', $admission->id)->first();
                            $comefromhome->allocation_id = $allocation->id;
                            $comefromhome->come_time = now()->format('Y-m-d') . ' ' . $validatedData['come_time'];
                            $comefromhome->save();
                            $this->resetinput();
                            $this->setmode('all');
                            $this->dispatch('alert',type:'success',message:'Come From Home Entry Created Successfully !!');            
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

    public function edit(ComeFromHome $comefromhome)
    {
        if($comefromhome){
            $this->student_id=$comefromhome->allocation->admission->student_id;
            $this->current_id=$comefromhome->id;
            $this->c_id=$comefromhome->id;
            $this->allocation_id=$comefromhome->allocation_id;
            $this->come_time =date('H:i', strtotime($comefromhome->come_time)) ;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(ComeFromHome $comefromhome)
    {
        $validatedData = $this->validate();
        if($comefromhome){
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
                            $comefromhome->allocation_id = $allocation->id;
                            $comefromhome->come_time = now()->format('Y-m-d') . ' ' . $validatedData['come_time'];
                            $comefromhome->update();
                            $this->resetinput();
                            $this->setmode('all');
                            $this->dispatch('alert',type:'success',message:'Come From Home Entry Updated Successfully !!');
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
        else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(ComeFromHome $comefromhome)
    {
        if($comefromhome){
            $comefromhome->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Come From Home Entry Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $comefromhome = ComeFromHome::withTrashed()->find($id);
        if($comefromhome){
            $comefromhome->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Come From Home Entry Restored Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $comefromhome = ComeFromHome::withTrashed()->find($this->delete_id);
        if($comefromhome){
            $comefromhome->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Come From Home Entry Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(ComeFromHome $comefromhome)
    {
        if($comefromhome->status==1)
        {   
            $comefromhome->status=0;
        }else
        {
            $comefromhome->status=1;
        }
        $comefromhome->update();
    }

    public function render()
    {    if($this->mode=='all')
        {
            $this->resetinput();
            $students=null;
        }else
        {
            $students=Student::select('id','name','username')->where('status',0)->orderBy('name',"ASC")->get();
        }

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
    

        return view('livewire.backend.student-come-from-home.all-student-come-from-home',compact('students','come_from_home'))->extends('layouts.admin.admin')->section('admin');
    }
}
