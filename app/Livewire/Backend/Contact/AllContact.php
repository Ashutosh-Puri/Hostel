<?php

namespace App\Livewire\Backend\Contact;

use App\Models\Contact;
use Livewire\Component;
use Livewire\WithPagination;

class AllContact extends Component
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
    public $subject;
    public $message;
    public $status;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email'],
            'mobile' => ['required', 'integer', 'digits:10'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:400'],
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

    public function resetinput()
    {
        $this->name=null;
        $this->email=null;
        $this->mobile=null;
        $this->subject=null;
        $this->message=null;
        $this->status=null;
    }

    public function save()
    {
        $validatedData = $this->validate();
        $contact= new Contact;
        if($contact){
            $contact->name = $validatedData['name'];
            $contact->email = $validatedData['email'];
            $contact->mobile = $validatedData['mobile'];
            $contact->subject = $validatedData['subject'];
            $contact->message = $validatedData['message'];
            $contact->status ='0';
            $contact->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Contact Created Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }

    }

    public function edit(Contact $contact)
    {
        if($contact)
        {
            $this->current_id=$contact->id;
            $this->c_id=$contact->id;
            $this->name = $contact->name;
            $this->email = $contact->email;
            $this->mobile = $contact->mobile;
            $this->subject = $contact->subject;
            $this->message = $contact->message;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(Contact $contact)
    {
        $validatedData = $this->validate();
        if($contact){
            $contact->name = $validatedData['name'];
            $contact->email = $validatedData['email'];
            $contact->mobile = $validatedData['mobile'];
            $contact->subject = $validatedData['subject'];
            $contact->message = $validatedData['message'];
            $contact->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Contact Updated Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(Contact $contact)
    {
        if($contact){
            $contact->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Contact Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $contact = Contact::withTrashed()->find($id);
        if($contact){
            $contact->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Contact Restored Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $contact = Contact::withTrashed()->find($this->delete_id);
        if($contact){
            $contact->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Contact Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update_status(Contact $contact)
    {
        if($contact->status==1)
        {
            $contact->status=0;
        }else
        {
            $contact->status=1;
        }
        $contact->update();
    }

    public function render()
    {   
        if($this->mode=='all')
        {
            $this->resetinput();
        }
        
        $contact = Contact::query()->when($this->search, function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })->withTrashed()->orderBy('name', 'ASC')->paginate($this->per_page);

        return view('livewire.backend.contact.all-contact',compact('contact'))->extends('layouts.admin.admin')->section('admin');
    }
}
