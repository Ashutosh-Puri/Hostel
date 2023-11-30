<?php

namespace App\Livewire\Backend\Fee;

use App\Models\Fee;
use App\Models\Seated;
use Livewire\Component;
use App\Models\AcademicYear;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class AllFee extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $seated_id;
    public $academic_year_id;
    public $status;
    public $amount;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'academic_year_id' => ['required','integer'],
            'amount' => ['required', 'numeric'],
            'seated_id' => ['required','integer',Rule::unique('fees')->where(function ($query) {
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
        $this->academic_year_id=null;
        $this->seated_id=null;
        $this->status=null;
        $this->amount=null;
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
        $fee= new Fee;
        if($fee){
            $fee->academic_year_id = $validatedData['academic_year_id'];
            $fee->seated_id = $validatedData['seated_id'];
            $fee->amount = $validatedData['amount'];
            $fee->status = $this->status==1?1:0;
            $fee->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Fee Created Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(Fee $fee)
    {
        if($fee)
        {
            $this->current_id=$fee->id;
            $this->c_id=$fee->id;
            $this->academic_year_id=$fee->academic_year_id;
            $this->seated_id = $fee->seated_id;
            $this->status = $fee->status;
            $this->amount = $fee->amount;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(Fee $fee)
    {
        $validatedData = $this->validate();
        if($fee){
            $fee->academic_year_id = $validatedData['academic_year_id'];
            $fee->seated_id = $validatedData['seated_id'];
            $fee->amount = $validatedData['amount'];
            $fee->status = $this->status==1?'1':'0';
            $fee->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Fee Updated Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(Fee $fee)
    {
        if($fee){
            $fee->delete();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Fee Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $fee = Fee::withTrashed()->find($id);
        if($fee){
            $fee->restore();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Fee Restored Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $fee = Fee::withTrashed()->find($this->delete_id);
        if($fee){
            $fee->forceDelete();
            $this->delete_id=null;
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Fee Deleted Successfully !!!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(Fee $fee)
    {
        if($fee->status==1)
        {
            $fee->status=0;
        }else
        {
            $fee->status=1;
        }
        $fee->update();
    }

    public function render()
    {
        
        if($this->mode!=='all')
        {
            $seateds=Seated::select('id','seated')->where('status',0)->orderBy('seated', 'ASC')->get();
            $academic_years=AcademicYear::select('id','year')->where('status',0)->orderBy('year', 'DESC')->get();
        }
        else
        {   
            $this->resetinput();
            $seateds=null;
            $academic_years=null;
        }
        $feesQuery = Fee::with('AcademicYear')->orderBy('academic_year_id', 'ASC');
        if ($this->search) {
            $feesQuery->whereHas('AcademicYear', function ($query) {
                $query->where('year', 'like', '%' . $this->search . '%');
            });
        }
        $fees = $feesQuery->withTrashed()->paginate($this->per_page);
        return view('livewire.backend.fee.all-fee',compact('academic_years','fees','seateds'))->extends('layouts.admin.admin')->section('admin');
    }
}
