<?php

namespace App\Http\Livewire\Backend\Inquiry;

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
            'description' => ['required', 'string',],
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
        $this->search=null;
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
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Enquiry Created Successfully !!"
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
        $enquiry = Enquiry::find($id);
        if($enquiry){
            $this->C_id=$enquiry->id;
            $this->name = $enquiry->name;
            $this->email = $enquiry->email;
            $this->mobile = $enquiry->mobile;
            $this->subject = $enquiry->subject;
            $this->description = $enquiry->description;
            $this->status = $enquiry->status;
            $this->gender = $enquiry->gender;
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
        $enquiry = Enquiry::find($id);
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
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Enquiry Updated Successfully !!"
            ]);
        }else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Something Went Wrong !!"
            ]);
        }
    }

     public function mail($id)
    { 
        $this->m_id=$id;
        $this->setmode('mail');
    }

    public function sendmail($id)
    {  
        $enquiry = Enquiry::find($id);
        $mail=Mail::to($enquiry->email)->send(new EnquiryReply($this->reply));
        if($mail)
        {
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Email Send  Successfully !!"
            ]);
        }
        else{
            $this->dispatchBrowserEvent('alert',[
                'type'=>'error',
                'message'=>"Email Not Send !!"
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
        $enquiry = Enquiry::find($this->delete_id);
        if($enquiry){
            $enquiry->delete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Enquiry Deleted Successfully !!"
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
        $status = Enquiry::find($id);
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
        $enquiries=Enquiry::where('name', 'like', '%'.$this->search.'%')->orderBy('created_at', 'DESC')->paginate($this->per_page);
        return view('livewire.backend.inquiry.all-enquiry',compact('enquiries'))->extends('layouts.admin.admin')->section('admin');
    }


}
