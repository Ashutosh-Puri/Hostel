<?php

namespace App\Http\Livewire\Backend\Cast;
use App\Models\Cast;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class AllCast extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
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
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Cast Created Successfully !!"
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
        $cast = Cast::find($id);
        if($cast){
            $this->c_id=$cast->id;
            $this->name = $cast->name;
            $this->category_id =$cast->category_id;
            $this->status = $cast->status;
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
        $cast = Cast::find($id);
        if($cast){
            $cast->name = $validatedData['name'];
            $cast->category_id = $validatedData['category_id'];
            $cast->status = $this->status==1?'1':'0';
            $cast->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Cast Updated Successfully !!"
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
        $cast = Cast::find($id);
        if($cast){
            $cast->delete();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Cast Deleted Successfully !!"
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
        $cast = Cast::withTrashed()->find($id);
        if($cast){
            $cast->restore();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Cast Restored Successfully !!"
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
        $cast = Cast::withTrashed()->find($this->delete_id);
        if($cast){
            $cast->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Cast Deleted Successfully !!"
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
        $status = Cast::find($id);
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
        $categories=Category::select('id','name')->get();

        $cast = Cast::query()->select('id','category_id','name','status','deleted_at')->when($this->search, function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })->withTrashed()->orderBy('name', 'ASC')->paginate($this->per_page);

        return view('livewire.backend.cast.all-cast',compact('cast','categories'))->extends('layouts.admin.admin')->section('admin');
    }
}
