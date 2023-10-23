<?php

namespace App\Http\Livewire\Backend\Rule;

use App\Models\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class AllRule extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
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
        $this->search=null;
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
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Rule Created Successfully !!"
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
        $rule = Rule::find($id);
        if($rule){
            $this->c_id=$rule->id;
            $this->name = $rule->name;
            $this->description = $rule->description;
            $this->status = $rule->status;
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
        $rule = Rule::find($id);
        if($rule){
            $rule->name = $validatedData['name'];
            $rule->description = $validatedData['description'];
            $rule->status = $this->status==1?'1':'0';
            $rule->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Rule Updated Successfully !!"
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
        $rule = Rule::find($id);
        if($rule){
            $rule->delete();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Rule Deleted Successfully !!"
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
        $rule = Rule::withTrashed()->find($id);
        if($rule){
            $rule->restore();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Rule Restored Successfully !!"
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
        $rule = Rule::withTrashed()->find($this->delete_id);
        if($rule){
            $rule->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Rule Deleted Successfully !!"
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
        $status = Rule::find($id);
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
        $rule = Rule::query()->when($this->search, function ($query) {
            return $query->where('description', 'like', '%' . $this->search . '%');
        })->withTrashed()->orderByRaw('CAST(SUBSTRING_INDEX(name, "Rule", -1) AS UNSIGNED) ASC')->paginate($this->per_page);

        return view('livewire.backend.rule.all-rule',compact('rule'))->extends('layouts.admin.admin')->section('admin');
    }
}
