<?php

namespace App\Livewire\Backend\Seated;

use App\Models\Seated;
use Livewire\Component;
use Livewire\WithPagination;

class AllSeated extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $seated_number = '';
    public $per_page = 10;
    public $mode='all';
    public $seated;
    public $status;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'seated' => ['required', 'integer', 'min:1','unique:seateds,seated,'.($this->mode=='edit'? $this->current_id :'')],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->seated=null;
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
        $validatedData = $validatedData = $this->validate();
        $seated= new Seated;
        if($seated){
            $seated->seated = $validatedData['seated'];
            $seated->status = $this->status==1?1:0;
            $seated->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Seated Created Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(Seated $seated)
    {
        if($seated){
            $this->current_id=$seated->id;
            $this->c_id=$seated->id;
            $this->status = $seated->status;
            $this->seated = $seated->seated;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(Seated $seated)
    {
        $validatedData = $this->validate();
        if($seated){
            $seated->seated = $validatedData['seated'];
            $seated->status = $this->status==1?1:0;
            $seated->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Seated Updated Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(Seated $seated)
    {
        if($seated){
            $seated->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Seated Deleted Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $seated = Seated::withTrashed()->find($id);
        if($seated){
            $seated->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Seated Restored Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $seated = Seated::withTrashed()->find($this->delete_id);
        if($seated){
            $seated->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Seated Deleted Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(Seated $seated)
    {
        if($seated->status==1)
        {
            $seated->status=0;
        }else
        {
            $seated->status=1;
        }
        $seated->update();
    }

    public function render()
    {   
        if($this->mode=='all')
        {
            $this->resetinput();
        }

        $seateds = Seated::query()->when($this->seated_number, function ($query) {
            return $query->where('seated', 'like', $this->seated_number . '%');
        })->withTrashed()->paginate($this->per_page);

        return view('livewire.backend.seated.all-seated',compact('seateds'))->extends('layouts.admin.admin')->section('admin');
    }
}
