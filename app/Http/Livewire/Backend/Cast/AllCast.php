<?php

namespace App\Http\Livewire\Backend\Cast;

use App\Models\Cast;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class AllCast extends Component
{   
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $category_id;
    public $status;
    public $c_id;
    public $current_id;


    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255','unique:casts,name,'.($this->mode=='edit'? $this->current_id :'')],
            'category_id' => ['required','integer'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->name=null;
        $this->category_id=null;
        $this->status=null;
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
        $cast= new Cast;
        if($cast){
            $cast->name = $validatedData['name'];
            $cast->category_id = $validatedData['category_id'];
            $cast->status = $this->status==1?1:0;
            $cast->save();
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Cast Created Successfully!!"
        ]);
    }

    public function edit($id)
    {
        $this->current_id=$id;
        $cast = Cast::find($id);
        if($cast){
            $this->C_id=$cast->id;
            $this->name = $cast->name;
            $this->category_id =$cast->category_id;
            $this->status = $cast->status;
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->setmode('edit');
    }

    public function update($id)
    {
        $validatedData = $this->validate();
        $cast = Cast::find($id);
        if($cast){
            $cast->name = $validatedData['name'];
            $cast->category_id = $validatedData['category_id'];
            $cast->status = $this->status==1?'1':'0';
            $cast->update();
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Cast Updated Successfully!!"
        ]);
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('delete-confirmation');

    }

    public function delete()
    {
        $cast = Cast::find($this->delete_id);
        if($cast){
            $cast->delete();
            $this->delete_id=null;
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Cast Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
        $categories=Category::all();
        $cast=Cast::where('name', 'like', '%'.$this->search.'%')->orderBy('name', 'ASC')->paginate($this->per_page);
        return view('livewire.backend.cast.all-cast',compact('cast','categories'))->extends('layouts.admin.admin')->section('admin');
    }
}