<?php

namespace App\Http\Livewire\Backend\Notice;

use App\Models\Notice;
use Livewire\Component;
use Livewire\WithPagination;

class AllNotice extends Component
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
            'name' => ['required', 'string', 'max:255','unique:notices,name,'.($this->mode=='edit'? $this->current_id :'')],
            'description' => ['required', 'string', 'max:2000','unique:notices,description,'.($this->mode=='edit'? $this->current_id :'')],
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
        $notice= new Notice;
        if($notice){
            $notice->name = $validatedData['name'];
            $notice->description = $validatedData['description'];
            $notice->status = $this->status==1?'1':'0';
            $notice->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Notice Created Successfully !!"
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
        $notice = Notice::find($id);
        if($notice){
            $this->c_id=$notice->id;
            $this->name = $notice->name;
            $this->description = $notice->description;
            $this->status = $notice->status;
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
        $notice = Notice::find($id);
        if($notice){
            $notice->name = $validatedData['name'];
            $notice->description = $validatedData['description'];
            $notice->status = $this->status==1?'1':'0';
            $notice->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Notice Updated Successfully !!"
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
        $notice = Notice::find($id);
        if($notice){
            $notice->delete();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Notice Deleted Successfully !!"
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
        $notice = Notice::withTrashed()->find($id);
        if($notice){
            $notice->restore();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Notice Restored Successfully !!"
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
        $notice = Notice::withTrashed()->find($this->delete_id);
        if($notice){
            $notice->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Notice Deleted Successfully !!"
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
        $status = Notice::find($id);
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
        $notice = Notice::query()->when($this->search, function ($query) {
            return $query->where('description', 'like', '%' . $this->search . '%');
        })->withTrashed()->orderBy('description', 'ASC')->paginate($this->per_page);

        return view('livewire.backend.notice.all-notice',compact('notice'))->extends('layouts.admin.admin')->section('admin');
    }

}
