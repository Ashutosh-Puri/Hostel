<?php

namespace App\Livewire\Backend\Enquiry;

use App\Models\Enquiry;
use Livewire\Component;
use App\Mail\EnquiryReply;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Mail;

class AllEnquiry extends Component
{
    use WithPagination;
    
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $email;
    public $mobile;
    public $gender;
    public $subject;
    public $description;
    public $status;
    public $c_id;
    public $m_id;
    public $reply;

    public $current_id;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'mobile' => ['required', 'integer', 'digits:10'],
            'gender' => ['required', 'integer', 'in:0,1'],
            'subject' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string','max:2000'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->name=null;
        $this->gender=null;
        $this->email=null;
        $this->mobile=null;
        $this->subject=null;
        $this->status=null;
        $this->description=null;
        $this->c_id=null;
        $this->m_id=null;
        $this->reply=null;
        $this->current_id=null;
    }

    public function setmode($mode)
    {
        $this->mode=$mode;
    }

    public function save()
    {
        $validatedData = $this->validate();
        $enquiry= new Enquiry;
        if($enquiry){
            $enquiry->name = $validatedData['name'];
            $enquiry->email = $validatedData['email'];
            $enquiry->mobile = $validatedData['mobile'];
            $enquiry->subject = $validatedData['subject'];
            $enquiry->description = $validatedData['description'];
            $enquiry->status = $this->status==1?'1':'0';
            $enquiry->gender = $this->gender==1?'1':'0';
            $enquiry->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Enquiry Created Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }

    }

    public function edit(Enquiry $enquiry)
    {
        if($enquiry)
        {
            $this->current_id=$enquiry->id;
            $this->c_id=$enquiry->id;
            $this->name = $enquiry->name;
            $this->email = $enquiry->email;
            $this->mobile = $enquiry->mobile;
            $this->subject = $enquiry->subject;
            $this->description = $enquiry->description;
            $this->status = $enquiry->status;
            $this->gender = $enquiry->gender;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(Enquiry $enquiry)
    {
        $validatedData = $this->validate();
        if($enquiry){
            $enquiry->name = $validatedData['name'];
            $enquiry->email = $validatedData['email'];
            $enquiry->mobile = $validatedData['mobile'];
            $enquiry->subject = $validatedData['subject'];
            $enquiry->description = $validatedData['description'];
            $enquiry->status = $this->status==1?'1':'0';
            $enquiry->gender = $this->gender==1?'1':'0';
            $enquiry->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Enquiry Updated Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

     public function mail(Enquiry $enquiry)
    {
        $this->m_id=$enquiry->id;
        $this->name=$enquiry->name;
        $this->email=$enquiry->email;
        $this->mobile=$enquiry->mobile;
        $this->subject=$enquiry->subject;
        $this->description=$enquiry->description;
        $this->setmode('mail');
    }

    public function sendmail(Enquiry $enquiry)
    {
        $this->validate([ 'reply' => ['required','string']]);
        $this->setmode('all');
        $mail=Mail::to($enquiry->email)->send(new EnquiryReply($this->reply ,$enquiry->name));
        if($mail)
        {   
            $enquiry->status=1;
            $enquiry->update();
            $this->resetinput();
            $this->dispatch('alert',type:'success',message:'Email Send  Successfully !!');
        }
        else{
            $this->dispatch('alert',type:'error',message:'Email Not Send !!');
        }

    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(Enquiry $enquiry)
    {
        if($enquiry){
            $enquiry->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Enquiry Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $enquiry = Enquiry::withTrashed()->find($id);
        if($enquiry){
            $enquiry->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Enquiry Restored Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $enquiry = Enquiry::withTrashed()->find($this->delete_id);
        if($enquiry){
            $enquiry->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Enquiry Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(Enquiry $enquiry)
    {
        if($enquiry->status==1)
        {
            $enquiry->status=0;
        }else
        {
            $enquiry->status=1;
        }
        $enquiry->update();
    }

    public function render()
    {   
        if($this->mode=='all')
        {
            $this->resetinput();
        }
        $enquiries = Enquiry::query()->when($this->search, function ($query) {
             return $query->where('name', 'like', '%' . $this->search . '%');
        })->withTrashed()->orderBy('status', 'ASC')->paginate($this->per_page);

        return view('livewire.backend.enquiry.all-enquiry',compact('enquiries'))->extends('layouts.admin.admin')->section('admin');
    }


}
