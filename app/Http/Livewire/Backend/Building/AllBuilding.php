<?php

namespace App\Http\Livewire\Backend\Building;

use App\Models\Hostel;
use Livewire\Component;
use App\Models\Building;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class AllBuilding extends Component
{

    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $building_name = '';
    public $hostel_name = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $status;
    public $hostel_id;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255','unique:buildings,name,'.($this->mode=='edit'? $this->current_id :'')],
            'hostel_id' => ['required','integer'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function resetinput()
    {
        $this->hostel_id=null;
        $this->hostel_name=null;
        $this->name=null;
        $this->status=null;
        $this->c_id=null;
        $this->building_name =null;
        $this->current_id=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    public function save()
    {
        $validatedData =  $this->validate();
        $building= new Building;
        if($building){
            $building->name = $validatedData['name'];
            $building->hostel_id = $validatedData['hostel_id'];
            $building->status = $this->status==1?1:0;
            $building->save();
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
            'message'=>"Building Created Successfully!!"
        ]);
    }

    public function edit($id)
    {
        $this->current_id=$id;
        $building = Building::find($id);
        if($building){
            $this->C_id=$building->id;
            $this->status = $building->status;
            $this->name = $building->name;
            $this->hostel_id = $building->hostel_id;
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
        $validatedData =  $this->validate();
        $building = Building::find($id);
        if($building){
            $building->name = $validatedData['name'];
            $building->hostel_id = $validatedData['hostel_id'];
            $building->status = $this->status==1?1:0;
            $building->update();
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
            'message'=>"Building Updated Successfully!!"
        ]);
    }


    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('delete-confirmation');

    }

    public function delete()
    {
        $building = Building::find($this->delete_id);
        if($building){
            $building->delete();
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
            'message'=>"Building Deleted Successfully!!"
        ]);
    }

    public function render()
    {
        $hostels=Hostel::where('status',0)->orderBy('name',"ASC")->get();

        $query = Building::orderBy('name', 'ASC');
        if ($this->hostel_name) {
            $query->whereHas('hostel', function ($query) {
                $query->where('status', 0)->where('name', 'like', '%' . $this->hostel_name . '%');
            });
        }
        $building = $query->where('name', 'like', '%' . $this->building_name . '%')->with('hostel')->paginate($this->per_page);
        return view('livewire.backend.building.all-building',compact('building','hostels'))->extends('layouts.admin.admin')->section('admin');
    }
}
