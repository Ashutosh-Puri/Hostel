<?php

namespace App\Livewire\Backend\AcademicYear;

use Livewire\Component;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AllAcademicYear extends Component
{   
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $year;
    public $status;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'year' => ['required', 'digits:4', 'integer','min:1900','unique:academic_years,year,'.($this->mode=='edit'? $this->current_id :'')]
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
       $this->year=null;
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
        $validatedData=$this->validate();
        $academicyear= new AcademicYear;
        if($academicyear){
            $academicyear->year = $validatedData['year'];
            $academicyear->status = $this->status==1?1:0;
            $academicyear->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Academic Year Created Successfully !!');  
        }
        else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(AcademicYear $academicyear)
    {   
        if($academicyear)
        {
            $this->current_id=$academicyear->id;
            $this->c_id=$academicyear->id;
            $this->year = $academicyear->year;
            $this->status = $academicyear->status;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }

    }

    public function update(AcademicYear $academicyear)
    {   
        $validatedData=$this->validate();
        if($academicyear)
        {
            $academicyear->year = $validatedData['year'];
            $academicyear->status = $this->status==1?'1':'0';
            $academicyear->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Academic Year Updated Successfully !!');  
        }else{

            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }


    public function softdelete(AcademicYear  $academicyear)
    { 
        if($academicyear)
        {
            $academicyear->delete();
            $this->setmode('all'); 
            $this->dispatch('alert',type:'success',message:'Academic Year Deleted Successfully !!');  

            
        }else{
            
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }


    public function restore($id)
    { 
        $academicyear = AcademicYear::withTrashed()->find($id);
        if($academicyear)
        {
            $academicyear->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Academic Year Restored Successfully !!');  
        }else{

            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $academicyear = AcademicYear::withTrashed()->find($this->delete_id);

        if (!$academicyear) {
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
            return;
        }

        $academicyear->forceDelete();
        $this->delete_id = null;
        $this->setmode('all');
        $this->dispatch('alert',type:'success',message:'Academic Year Deleted Successfully !!');  
    }


    public function update_status(AcademicYear  $academicyear)
    {
        if($academicyear->status==1)
        {   
            $academicyear->status=0;
        }else
        {
            $academicyear->status=1;
        }
        $academicyear->update();
    }

    public function render()
    {   

        if($this->mode=='all')
        {
            $this->resetinput();
        }
        $academicyear = AcademicYear::query()->select('id','year', 'status','deleted_at')->when($this->search, function ($query) {
            return $query->where('year', 'like', '%' . $this->search . '%');
        })->latest('year')->withTrashed()->paginate($this->per_page);

        return view('livewire.backend.academic-year.all-academic-year',compact('academicyear'))->extends('layouts.admin.admin')->section('admin');
    }
}
