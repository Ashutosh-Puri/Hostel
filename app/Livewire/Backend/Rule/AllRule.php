<?php

namespace App\Livewire\Backend\Rule;

use App\Models\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class AllRule extends Component
{
    use WithPagination;
    
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $description;
    public $status;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255','unique:rules,name,'.($this->mode=='edit'? $this->current_id :'')],
            'description' => ['required', 'string', 'max:2000','unique:rules,description,'.($this->mode=='edit'? $this->current_id :'')],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->name=null;
        $this->status=null;
        $this->description=null;
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
        $rule= new Rule;
        if($rule){
            $rule->name = $validatedData['name'];
            $rule->description = $validatedData['description'];
            $rule->status = $this->status==1?'1':'0';
            $rule->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Rule Created Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }

    }

    public function edit(Rule $rule)
    {
        if($rule){
            $this->current_id=$rule->id;
            $this->c_id=$rule->id;
            $this->name = $rule->name;
            $this->description = $rule->description;
            $this->status = $rule->status;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(Rule $rule)
    {
        $validatedData = $this->validate();
        if($rule){
            $rule->name = $validatedData['name'];
            $rule->description = $validatedData['description'];
            $rule->status = $this->status==1?'1':'0';
            $rule->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Rule Updated Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(Rule $rule)
    {;
        if($rule){
            $rule->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Rule Deleted Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $rule = Rule::withTrashed()->find($id);
        if($rule){
            $rule->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Rule Restored Successfully !!');  
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $rule = Rule::withTrashed()->find($this->delete_id);
        if($rule){
            $rule->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Rule Deleted Successfully !!'); 
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(Rule $rule)
    {
        $rule = Rule::find($id);
        if($rule->status==1)
        {
            $rule->status=0;
        }else
        {
            $rule->status=1;
        }
        $rule->update();
    }

    public function render()
    {   
        if($this->mode=='all')
        {
            $this->resetinput();
        }
        
        $rule = Rule::query()->when($this->search, function ($query) {
            return $query->where('description', 'like', '%' . $this->search . '%');
        })->withTrashed()->orderByRaw('CAST(SUBSTRING_INDEX(name, "Rule", -1) AS UNSIGNED) ASC')->paginate($this->per_page);

        return view('livewire.backend.rule.all-rule',compact('rule'))->extends('layouts.admin.admin')->section('admin');
    }
}
