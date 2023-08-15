<?php

namespace App\Http\Livewire\Backend\Bed;

use App\Models\Bed;
use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class AllBed extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $room_id;
    public $status;
    public $c_id;

    public function resetinput()
    {
        $this->c_id=null;
        $this->status=null;
        $this->room_id=null;
        $this->search =null;
    }


    protected function rules()
    {
        return [
            'room_id' => ['required','integer'],
        ];
    }

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
        $bed= new Bed;
        if($bed){
            $bed->room_id = $validatedData['room_id'];
            $bed->status = $this->status==1?1:0;
            $bed->save();
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
            'message'=>"Bed Created Successfully!!"
        ]);
    }

    public function edit($id)
    {
        $bed = Bed::find($id);
        if($bed){
            $this->C_id=$bed->id;
            $this->room_id=$bed->room_id;
            $this->status = $bed->status;
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
        $bed = Bed::find($id);
        if($bed){
            $bed->room_id = $validatedData['room_id'];
            $bed->status = $this->status==1?'1':'0';
            $bed->update();
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
            'message'=>"Bed Updated Successfully!!"
        ]);
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('delete-confirmation');

    }

    public function delete()
    {
        $bed = Bed::find($this->delete_id);
        if($bed){
            $bed->delete();
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
            'message'=>"Bed Deleted Successfully!!"
        ]);
    }

    public function render()
    {
        $rooms=Room::orderBy('floor', 'ASC')->get();
        $beds= Bed::with('room:id,label')->orderBy('room_id', 'ASC')->when($this->search, function ($query) {
            $query->whereHas('room', function ($query) {
                $query->where('label', 'like', '%' . $this->search . '%');
            });
        })->paginate($this->per_page);
        return view('livewire.backend.bed.all-bed',compact('beds','rooms'))->extends('layouts.admin.admin')->section('admin');
    }
}
