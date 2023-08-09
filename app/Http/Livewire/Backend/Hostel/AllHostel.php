<?php

namespace App\Http\Livewire\Backend\Hostel;

use App\Models\Hostel;
use App\Models\College;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class AllHostel extends Component
{   
    use WithPagination;
    public $college_name = '';
    public $hostel_name = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $status;
    public $college_id;
    public $c_id;
 
    public function resetinput()
    {
        $this->college_id=null;
        $this->name=null;
        $this->status=null;
        $this->c_id=null;
        $this->college_name =null;
        $this->hostel_name =null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }
 
    public function save()
    {
        $validatedData = $validatedData = $this->validate([
            'name' => ['required','string', Rule::unique('Hostels', 'name')],
            'college_id'=>['required','integer'],
        ]);
        $hostel= new Hostel;
        $hostel->name = $validatedData['name'];
        $hostel->college_id = $validatedData['college_id'];
        $hostel->status = $this->status==1?1:0;
        $hostel->save();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Hostel Created Successfully!!"
        ]);
    }

    public function edit($id)
    { 
        $hostel = Hostel::find($id);
        $this->C_id=$hostel->id;
        $this->college_id=$hostel->college_id;
        $this->status = $hostel->status;
        $this->name = $hostel->name;
        $this->setmode('edit');
    }

    public function update($id)
    {   
        $validatedData = $this->validate([
            'name' => ['required','string', Rule::unique('Hostels', 'name')->ignore($this->name, 'name')],
            'college_id'=>['required','integer'],
        ]);
        $hostel = Hostel::find($id);
        $hostel->name = $validatedData['name'];
        $hostel->college_id = $validatedData['college_id'];
        $hostel->status = $this->status==1?1:0;
        $hostel->update();
        $this->resetinput();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Hostel Updated Successfully!!"
        ]); 
    }

    public function delete($id)
    { 
        $hostel = Hostel::find($id);
        $hostel->delete();
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Hostel Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
        $colleges=College::where('status',0)->orderBy('name',"ASC")->get();

        $query =Hostel::orderBy('name', 'ASC');      
        if ($this->college_name) {
            $collegeIds = College::where('status', 0)->where('name', 'like', '%' . $this->college_name. '%')->pluck('id');
            $query->whereIn('college_id', $collegeIds);
        }
        $hostels = $query->where('name', 'like', '%'.$this->hostel_name.'%')->paginate($this->per_page);
       
        return view('livewire.backend.Hostel.all-Hostel',compact('hostels','colleges'))->extends('layouts.admin')->section('admin');
    }
}
