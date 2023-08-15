<?php

namespace App\Http\Livewire\Backend\Fine;

use App\Models\Fine;
use Livewire\Component;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class AllFine extends Component
{
    use WithPagination;
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $year = '';
    public $fine_name = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $amount;
    public $academic_year_id;
    public $status;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'academic_year_id' => ['required','integer'],
            'amount' => ['required', 'numeric'],
            'name' => ['required','string',Rule::unique('fines')->where(function ($query) {
                return $query->where('academic_year_id', $this->academic_year_id);
            })->ignore($this->current_id)],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function resetinput()
    {
        $this->year=null;
        $this->fine_name=null;
        $this->type=null;
        $this->name=null;
        $this->amount=null;
        $this->academic_year_id=null;
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
        $fine= new Fine;
        if($fine){
            $fine->academic_year_id = $validatedData['academic_year_id'];
            $fine->name = $validatedData['name'];
            $fine->amount = $validatedData['amount'];
            $fine->status = $this->status==1?1:0;
            $fine->save();
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
            'message'=>"Fine Created Successfully!!"
        ]);
    }

    public function edit($id)
    {
        $this->current_id=$id;
        $fine = Fine::find($id);
        if($fine){
            $this->C_id=$fine->id;
            $this->academic_year_id=$fine->academic_year_id;
            $this->name = $fine->name;
            $this->amount = $fine->amount;
            $this->status = $fine->status;
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
        $fine = Fine::find($id);
        if($fine){
            $fine->academic_year_id = $validatedData['academic_year_id'];
            $fine->name = $validatedData['name'];
            $fine->amount = $validatedData['amount'];
            $fine->status = $this->status==1?'1':'0';
            $fine->update();
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
            'message'=>"Fine Updated Successfully!!"
        ]);
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatchBrowserEvent('delete-confirmation');

    }

    public function delete()
    {
        $fine = Fine::find($this->delete_id);
        if($fine){
            $fine->delete();
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
            'message'=>"Fine Deleted Successfully!!"
        ]);
    }

    public function render()
    {
        $academic_years=AcademicYear::where('status',0)->orderBy('year', 'DESC')->get();
        $query = Fine::query();
        if ($this->year) {
            $query->whereHas('academicYear', function ($subQuery) {
                $subQuery->where('year', 'like', '%' . $this->year . '%');
            });
        }
        $fines = $query->where('name', 'like', '%' . $this->fine_name . '%')->orderBy('academic_year_id', 'ASC')->paginate($this->per_page);
        return view('livewire.backend.fine.all-fine',compact('academic_years','fines'))->extends('layouts.admin.admin')->section('admin');
    }

}
