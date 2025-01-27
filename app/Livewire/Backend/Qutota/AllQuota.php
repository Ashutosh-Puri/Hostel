<?php

namespace App\Livewire\Backend\Qutota;

use App\Models\Quota;
use App\Models\Classes;
use Livewire\Component;
use App\Models\AcademicYear;
use Livewire\WithPagination;

class AllQuota extends Component
{
    use WithPagination;
    
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $year = '';
    public $class_name = '';
    public $per_page = 10;
    public $mode='all';
    public $max_capacity;
    public $academic_year_id;
    public $class_id;
    public $status;
    public $c_id;

    public function resetinput()
    {
        $this->max_capacity=null;
        $this->class_id=null;
        $this->academic_year_id=null;
        $this->status=null;
        $this->c_id=null;
    }

    protected $rules = [
        'max_capacity' => ['required','integer','min:1'],
        'academic_year_id' => ['required','integer'],
        'class_id' => ['required','integer'],
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    public function save()
    {
        $validatedData = $this->validate();
        $quota= new Quota;
        if($quota){
            $quota->academic_year_id = $validatedData['academic_year_id'];
            $quota->class_id = $validatedData['class_id'];
            $quota->max_capacity = $validatedData['max_capacity'];
            $quota->status = $this->status==1?1:0;
            $quota->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Quota Created Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(Quota $quota)
    {
        if($quota){
            $this->c_id=$quota->id;
            $this->academic_year_id=$quota->academic_year_id;
            $this->class_id=$quota->class_id;
            $this->max_capacity = $quota->max_capacity;
            $this->status = $quota->status;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(Quota $quota)
    {
        $validatedData = $this->validate();
        if($quota){
            $quota->academic_year_id = $validatedData['academic_year_id'];
            $quota->class_id = $validatedData['class_id'];
            $quota->max_capacity = $validatedData['max_capacity'];
            $quota->status = $this->status==1?'1':'0';
            $quota->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Quota Updated Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(Quota $quota)
    {
        if($quota){
            $quota->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Quota Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $quota = Quota::withTrashed()->find($id);
        if($quota){
            $quota->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Quota Restored Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $quota = Quota::withTrashed()->find($this->delete_id);
        if($quota){
            $quota->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Quota Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(Quota $quota)
    {
        if($quota->status==1)
        {
            $quota->status=0;
        }else
        {
            $quota->status=1;
        }
        $quota->update();
    }

    public function render()
    {   
        if($this->mode!=='all')
        {
            $academic_years=AcademicYear::select('id',"year")->where('status',0)->orderBy('year', 'DESC')->get();
            $classes=Classes::select('id',"name")->where('status',0)->get();
        }
        else
        {
            $this->resetinput();
            $academic_years=null;
            $classes=null;
        }

        $query = Quota::with('AcademicYear', 'Class')->orderBy('academic_year_id', 'DESC');
        if ($this->year) {
            $query->whereHas('AcademicYear', function ($query) {
                $query->where('year', 'like', '%' . $this->year . '%');
            });
        }
        if ($this->class_name) {
            $query->whereHas('Class', function ($query) {
                $query->where('name', 'like', '%' . $this->class_name . '%');
            });
        }
        $quotas = $query->withTrashed()->paginate($this->per_page);
        return view('livewire.backend.qutota.all-quota',compact('quotas','classes','academic_years'))->extends('layouts.admin.admin')->section('admin');
    }

}
