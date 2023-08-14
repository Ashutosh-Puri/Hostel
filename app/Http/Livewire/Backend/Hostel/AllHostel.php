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
    public $current_id;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255','unique:hostels,name,'.($this->mode=='edit'? $this->current_id :'')],
            'college_id'=>['required','integer'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
 
    public function resetinput()
    {
        $this->college_id=null;
        $this->name=null;
        $this->status=null;
        $this->c_id=null;
        $this->college_name =null;
        $this->hostel_name =null;
        $this->current_id=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }
 
    public function save()
    {
        $validatedData = $validatedData = $this->validate();
        $hostel= new Hostel;
        if($hostel){
            $hostel->name = $validatedData['name'];
            $hostel->college_id = $validatedData['college_id'];
            $hostel->status = $this->status==1?1:0;
            $hostel->save();
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
            'message'=>"Hostel Created Successfully!!"
        ]);
    }

    public function edit($id)
    {   
        $this->current_id=$id;
        $hostel = Hostel::find($id);
        if($hostel){
            $this->C_id=$hostel->id;
            $this->college_id=$hostel->college_id;
            $this->status = $hostel->status;
            $this->name = $hostel->name;
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
        $hostel = Hostel::find($id);
        if($hostel){
            $hostel->name = $validatedData['name'];
            $hostel->college_id = $validatedData['college_id'];
            $hostel->status = $this->status==1?1:0;
            $hostel->update();
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
            'message'=>"Hostel Updated Successfully!!"
        ]); 
    }

    public function delete($id)
    { 
        $hostel = Hostel::find($id);
        if($hostel){
            $hostel->delete();
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong!!"
            ]);
        }
        $this->setmode('all');
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Hostel Deleted Successfully!!"
        ]);
    }

    public function render()
    {   
        $colleges=College::where('status',0)->orderBy('name',"ASC")->get();
        $query = Hostel::orderBy('name', 'ASC');
        if ($this->college_name || $this->hostel_name) {
            $query->when($this->college_name, function ($query) {
                $query->whereIn('college_id', function ($subQuery) {
                    $subQuery->select('id')
                        ->from('colleges')
                        ->where('status', 0)
                        ->where('name', 'like', '%' . $this->college_name . '%');
                });
            })
            ->when($this->hostel_name, function ($query) {
                $query->where('name', 'like', '%' . $this->hostel_name . '%');
            });
        }
        $hostels = $query->paginate($this->per_page);
        return view('livewire.backend.Hostel.all-Hostel',compact('hostels','colleges'))->extends('layouts.admin.admin')->section('admin');
    }
}
