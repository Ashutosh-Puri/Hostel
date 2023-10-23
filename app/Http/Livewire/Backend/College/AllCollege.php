<?php

namespace App\Http\Livewire\Backend\College;

use App\Models\College;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class AllCollege extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $name_mr;
    public $heading_1;
    public $heading_1_mr;
    public $email;
    public $mobile;
    public $address;
    public $status;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255','unique:colleges,name,'.($this->mode=='edit'? $this->current_id :'')],
            'name_mr' => ['required', 'string', 'max:255',],
            'heading_1' => ['required', 'string', 'max:255'],
            'heading_1_mr' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'numeric', ],
            'email' => ['required', 'email', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->name=null;
        $this->name_mr=null;
        $this->heading_1=null;
        $this->heading_1_mr=null;
        $this->email=null;
        $this->mobile=null;
        $this->address=null;
        $this->status=null;
        $this->c_id=null;
        $this->earch =null;
        $this->current_id=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    public function save()
    {
        $validatedData = $validatedData = $this->validate();
        $college= new College;
        if($college){
            $college->name = $validatedData['name'];
            $college->name_mr = $validatedData['name_mr'];
            $college->heading_1 = $validatedData['heading_1'];
            $college->heading_1_mr = $validatedData['heading_1_mr'];
            $college->mobile = $validatedData['mobile'];
            $college->email = $validatedData['email'];
            $college->address = $validatedData['address'];
            $college->status = $this->status==1?1:0;
            $college->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"College Created Successfully !!"
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
        $college = College::find($id);
        if($college){
            $this->c_id=$college->id;
            $this->status = $college->status;
            $this->name = $college->name;
            $this->name_mr = $college->name_mr;
            $this->heading_1 = $college->heading_1;
            $this->heading_1_mr = $college->heading_1_mr;
            $this->email = $college->email;
            $this->mobile = $college->mobile;
            $this->address = $college->address;
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
        $college = College::find($id);
        if($college){
            $college->name = $validatedData['name'];
            $college->name_mr = $validatedData['name_mr'];
            $college->heading_1 = $validatedData['heading_1'];
            $college->heading_1_mr = $validatedData['heading_1_mr'];
            $college->mobile = $validatedData['mobile'];
            $college->email = $validatedData['email'];
            $college->address = $validatedData['address'];
            $college->status = $this->status==1?1:0;
            $college->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"College Updated Successfully !!"
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
        $college = College::find($id);
        if($college){
            $college->delete();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"College Deleted Successfully !!"
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
        $college = College::withTrashed()->find($id);
        if($college){
            $college->restore();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"College Restored Successfully !!"
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
        $college = College::withTrashed()->find($this->delete_id);
        if($college){
            $college->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"College Deleted Successfully !!"
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
        $status = College::find($id);
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
        $colleges = College::query()->when($this->search, function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })->orderBy('name', 'ASC')->withTrashed()->paginate($this->per_page);

        return view('livewire.backend.College.all-College',compact('colleges'))->extends('layouts.admin.admin')->section('admin');
    }
}
