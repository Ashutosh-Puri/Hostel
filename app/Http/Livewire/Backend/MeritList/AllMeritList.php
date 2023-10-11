<?php

namespace App\Http\Livewire\Backend\MeritList;

use Livewire\Component;
use App\Models\MeritList;
use Livewire\WithPagination;

class AllMeritList extends Component
{   
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $m_name = '';
    public $m_class = '';
    public $sortby_feild='id';
    public $sortby_order="DESC";
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $mobile;
    public $email;
    public $class;
    public $gender;
    public $sgpa;
    public $percentage;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'class' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'mobile' => ['required', 'integer', 'digits:10'],
            'gender' => ['required', 'integer', 'in:0,1'],
            'percentage'=>['required','numeric','min:0','max:100'],
            'sgpa'=>['nullable','numeric','min:0.00','max:10.00'],
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
    public function clear()
    {
        $this->sortby_feild='percentage';
        $this->sortby_order='DESC';
    }

    public function resetinput()
    {
        $this->name=null;
        $this->gender=null;
        $this->mobile=null;
        $this->email=null; 
        $this->class=null; 
        $this->percentage=null;
        $this->sgpa=null;
    }

    public function save()
    {
        $validatedData = $this->validate();
        $merit= new MeritList;
        if($merit){
            $merit->name = $validatedData['name'];
            $merit->email = $validatedData['email'];
            $merit->class = $validatedData['class'];
            $merit->mobile = $validatedData['mobile'];
            $merit->sgpa = $validatedData['sgpa'];
            $merit->percentage = $validatedData['percentage'];
            $merit->gender = $this->gender==1?'1':'0';
            $merit->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Merit List Created Successfully !!"
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
        $meritlist = MeritList::find($id);
        if($meritlist){
            $this->C_id=$meritlist->id;
            $this->name=$meritlist->name;
            $this->email=$meritlist->email;
            $this->class=$meritlist->class;
            $this->mobile=$meritlist->mobile;
            $this->sgpa = $meritlist->sgpa;
            $this->percentage = $meritlist->percentage;
            $this->gender = $meritlist->gender;
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
        $merit = MeritList::find($id);
        if($merit){
            $merit->name = $validatedData['name'];
            $merit->email = $validatedData['email'];
            $merit->class = $validatedData['class'];
            $merit->mobile = $validatedData['mobile'];
            $merit->sgpa = $validatedData['sgpa'];
            $merit->percentage = $validatedData['percentage'];
            $merit->gender = $this->gender==1?'1':'0';
            $merit->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Merit List Updated Successfully !!"
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

    public function delete()
    {
        $meritlist = MeritList::find($this->delete_id);
        if($meritlist){
            $meritlist->delete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Merit List Deleted Successfully !!"
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
        $status = MeritList::find($id);
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
        if (is_numeric($this->sgpa) && $this->sgpa >=1) {
            $this->percentage = (($this->sgpa * 10) - 7.5);
        }
    
        $meritlistQuery = MeritList::orderBy($this->sortby_feild, $this->sortby_order);
        if ($this->m_name) {
            $meritlistQuery->where('name', 'like', '%' . $this->m_name . '%'); 
        }

        if ($this->m_class) {
            $meritlistQuery->where('class', 'like', '%' . $this->m_class . '%'); 
        }
        $meritlist = $meritlistQuery->paginate($this->per_page);
 
       
        return view('livewire.backend.merit-list.all-merit-list',compact('meritlist'))->extends('layouts.admin.admin')->section('admin');
    }
}
