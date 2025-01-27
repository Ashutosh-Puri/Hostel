<?php

namespace App\Livewire\Backend\Fine;

use App\Models\Fine;
use Livewire\Component;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class AllFine extends Component
{
    use WithPagination;
    
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $year = '';
    public $fine_name = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $amount;
    public $academic_year_id;
    public $status;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'academic_year_id' => ['required','integer'],
            'amount' => ['required', 'numeric'],
            'name' => ['required','string',Rule::unique('fines')->where(function ($query) {
                return $query->where('academic_year_id', $this->academic_year_id);
            })->ignore($this->current_id)],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->type=null;
        $this->name=null;
        $this->amount=null;
        $this->academic_year_id=null;
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
        $fine= new Fine;
        if($fine){
            $fine->academic_year_id = $validatedData['academic_year_id'];
            $fine->name = $validatedData['name'];
            $fine->amount = $validatedData['amount'];
            $fine->status = $this->status==1?1:0;
            $fine->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Fine Created Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(Fine $fine)
    {
        if($fine)
        {
            $this->current_id=$fine->id;
            $this->c_id=$fine->id;
            $this->academic_year_id=$fine->academic_year_id;
            $this->name = $fine->name;
            $this->amount = $fine->amount;
            $this->status = $fine->status;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(Fine $fine)
    {
        $validatedData = $this->validate();
        if($fine){
            $fine->academic_year_id = $validatedData['academic_year_id'];
            $fine->name = $validatedData['name'];
            $fine->amount = $validatedData['amount'];
            $fine->status = $this->status==1?'1':'0';
            $fine->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Fine Updated Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(Fine $fine)
    {
        if($fine){
            $fine->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Fine Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $fine = Fine::withTrashed()->find($id);
        if($fine){
            $fine->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Fine Restored Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $fine = Fine::withTrashed()->find($this->delete_id);
        if($fine){
            $fine->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Fine Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(Fine $fine)
    {
        if($fine->status==1)
        {
            $fine->status=0;
        }else
        {
            $fine->status=1;
        }
        $fine->update();
    }

    public function render()
    {   
        if($this->mode!=='all')
        {
            $academic_years=AcademicYear::select('id','year')->where('status',0)->orderBy('year', 'DESC')->get();
        }
        else
        {   
            $this->resetinput();
            $academic_years=null;
        }

        $query = Fine::query()->with('academicyear');
        if ($this->year) {
            $query->whereHas('academicyear', function ($subQuery) {
                $subQuery->where('year', 'like', '%' . $this->year . '%');
            });
        }

        $fines = $query->when($this->fine_name, function ($query) {
            return $query->where('name', 'like', '%' . $this->fine_name . '%');
        })->orderBy('academic_year_id', 'ASC')->withTrashed()->paginate($this->per_page);

        return view('livewire.backend.fine.all-fine',compact('academic_years','fines'))->extends('layouts.admin.admin')->section('admin');
    }

}
