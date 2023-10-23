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
    protected $paginationTheme = 'bootstrap';
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
            'name' => ['required', 'string', 'max:255',Rule::unique('buildings', 'name')->where('hostel_id', $this->hostel_id)->ignore($this->current_id), ],
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
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Building Created Successfully !!"
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
        $building = Building::find($id);
        if($building){
            $this->c_id=$building->id;
            $this->status = $building->status;
            $this->name = $building->name;
            $this->hostel_id = $building->hostel_id;
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
        $validatedData =  $this->validate();
        $building = Building::find($id);
        if($building){
            $building->name = $validatedData['name'];
            $building->hostel_id = $validatedData['hostel_id'];
            $building->status = $this->status==1?1:0;
            $building->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Building Updated Successfully !!"
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
        $building = Building::find($id);
        if($building){
            $building->delete();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Building Deleted Successfully !!"
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
        $building = Building::withTrashed()->find($id);
        if($building){
            $building->restore();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Building Restored Successfully !!"
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
        $building = Building::withTrashed()->find($this->delete_id);
        if($building){
            $building->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Building Deleted Successfully !!"
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
        $status = Building::find($id);
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
        $hostels=Hostel::where('status',0)->orderBy('name',"ASC")->get();
        $query = Building::select('id','hostel_id','name','status','deleted_at')->with('hostel')->orderBy('name', 'ASC');
        if ($this->hostel_name) {
            $query->whereHas('hostel', function ($query) {
                $query->where('status', 0)->where('name', 'like', '%' . $this->hostel_name . '%');
            });
        }

        $building = $query->when($this->building_name, function ($query) {
            return $query->where('name', 'like', '%' . $this->building_name . '%');
        })->withTrashed()->paginate($this->per_page);

        return view('livewire.backend.building.all-building',compact('building','hostels'))->extends('layouts.admin.admin')->section('admin');
    }
}
