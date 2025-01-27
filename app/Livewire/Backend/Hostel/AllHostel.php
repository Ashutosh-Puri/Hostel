<?php

namespace App\Livewire\Backend\Hostel;

use App\Models\Hostel;
use App\Models\College;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class AllHostel extends Component
{
    use WithPagination;
    
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $college_name = '';
    public $hostel_name = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $status;
    public $gender;
    public $college_id;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'college_id'=>['required','integer'],
            'name' => ['required', 'string', 'max:255',Rule::unique('hostels', 'name')->ignore($this->current_id)->where(function ($query) {
                return $query->where('college_id', $this->college_id);
            })],
            'gender'=>['required','integer','in:0,1'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->college_id=null;
        $this->name=null;
        $this->status=null;
        $this->gender=null;
        $this->c_id=null;
        $this->current_id=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    public function save()
    {
        $validatedData = $validatedData = $this->validate();
        $hostel= new Hostel;
        if($hostel){
            $hostel->name = $validatedData['name'];
            $hostel->college_id = $validatedData['college_id'];
            $hostel->status = $this->status==1?1:0;
            $hostel->gender = $this->gender==1?1:0;
            $hostel->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Hostel Created Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(Hostel $hostel)
    {
        if($hostel)
        {
            $this->current_id=$hostel->id;
            $this->c_id=$hostel->id;
            $this->college_id=$hostel->college_id;
            $this->status = $hostel->status;
            $this->gender = $hostel->gender;
            $this->name = $hostel->name;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(Hostel $hostel)
    {
        $validatedData = $this->validate();
        if($hostel){
            $hostel->name = $validatedData['name'];
            $hostel->college_id = $validatedData['college_id'];
            $hostel->status = $this->status==1?1:0;
            $hostel->gender = $this->gender==1?1:0;
            $hostel->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Hostel Updated Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(Hostel $hostel)
    {
        if($hostel){
            $hostel->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Hostel Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $hostel = Hostel::withTrashed()->find($id);
        if($hostel){
            $hostel->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'"Hostel Restored Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $hostel = Hostel::withTrashed()->find($this->delete_id);
        if($hostel){
            $hostel->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'"Hostel Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(Hostel $hostel)
    {
        if($hostel->status==1)
        {
            $hostel->status=0;
        }else
        {
            $hostel->status=1;
        }
        $hostel->update();
    }

    public function render()
    {   
        if($this->mode!=='all')
        {
            $colleges=College::select('id','name','deleted_at')->where('status',0)->orderBy('name',"ASC")->get();
        }
        else
        {   
            $this->resetinput();
            $colleges=null;
        }

        $query = Hostel::orderBy('name', 'ASC');
        if ($this->college_name || $this->hostel_name) {
            $query->when($this->college_name, function ($query) {
                $query->whereIn('college_id', function ($subQuery) {
                    $subQuery->select('id')->from('colleges')->where('status', 0)->where('name', 'like', '%' . $this->college_name . '%');
                });
            })->when($this->hostel_name, function ($query) {
                $query->where('name', 'like', '%' . $this->hostel_name . '%');
            });
        }
        $hostels = $query->withTrashed()->paginate($this->per_page);
        return view('livewire.backend.Hostel.all-Hostel',compact('hostels','colleges'))->extends('layouts.admin.admin')->section('admin');
    }
}
