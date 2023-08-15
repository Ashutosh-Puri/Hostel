<?php

namespace App\Http\Livewire\Backend\Facility;

use App\Models\Room;
use Livewire\Component;
use App\Models\Facility;
use Livewire\WithPagination;

class AllFacility extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $room_id;
    public $status;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255','unique:facilities,name,'.($this->mode=='edit'? $this->current_id :'')],
            'room_id' => ['required','integer'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->search=null;
        $this->name=null;
        $this->room_id=null;
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
        $facility= new Facility;
        if($facility){
            $facility->room_id = $validatedData['room_id'];
            $facility->name = $validatedData['name'];
            $facility->status = $this->status==1?1:0;
            $facility->save();
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
            'message'=>"Facility Created Successfully!!"
        ]);
    }

    public function edit($id)
    {
        $this->current_id=$id;
        $facility = Facility::find($id);
        if($facility){
            $this->C_id=$facility->id;
            $this->room_id=$facility->room_id;
            $this->name = $facility->name;
            $this->status = $facility->status;
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
        $facility = Facility::find($id);
        if($facility){
            $facility->room_id = $validatedData['room_id'];
            $facility->name = $validatedData['name'];
            $facility->status = $this->status==1?'1':'0';
            $facility->update();
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
            'message'=>"Facility Updated Successfully!!"
        ]);
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('delete-confirmation');

    }

    public function delete()
    {
        $facility = Facility::find($this->delete_id);
        if($facility){
            $facility->delete();
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
            'message'=>"Facility Deleted Successfully!!"
        ]);
    }

    public function render()
    {
        $rooms=Room::orderBy('floor', 'ASC')->get();
        $facilityQuery = Facility::orderBy('room_id', 'ASC');
        if ($this->search) {
            $facilityQuery->whereHas('room', function ($query) {
                $query->where('label', 'like', '%' . $this->search . '%');
            });
        }
        $facility = $facilityQuery->paginate($this->per_page);
        return view('livewire.backend.facility.all-facility',compact('facility','rooms'))->extends('layouts.admin.admin')->section('admin');
    }
}
