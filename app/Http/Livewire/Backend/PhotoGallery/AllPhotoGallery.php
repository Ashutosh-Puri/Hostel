<?php

namespace App\Http\Livewire\Backend\PhotoGallery;

use Livewire\Component;
use App\Models\PhotoGallery;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;

class AllPhotoGallery extends Component
{
    use WithPagination;
    use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $photo;
    public $photoold;
    public $title;
    public $status;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'title' => ['required', 'string', 'max:255','unique:photo_galleries,title,'.($this->mode=='edit'? $this->current_id :'')],
            'photo'=>[($this->mode=='edit'? 'nullable' : ($this->photoold!=null? 'nullable' : 'required')),'image','mimes:jpeg,jpg,png','max:2048'],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->photo=null;
        $this->photoold=null;
        $this->status=null;
        $this->title=null;
        $this->c_id=null;
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
        $photogallery= new PhotoGallery;
        if($photogallery){
            $photogallery->title = $validatedData['title'];
            $photogallery->status = $this->status==1?'1':'0';
            if ($this->photo) {
                if($photogallery->photo)
                {
                    File::delete($photogallery->photo);
                }
                $path = 'uploads/photogallery/';
                $fileName = 'photo-' . time(). '.' . $this->photo->getClientOriginalExtension();
                $this->photo->storeAs($path, $fileName, 'public');
                $photogallery->photo = 'storage/' . $path . $fileName;
                $this->reset('photo');
            }
            $photogallery->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Photo Created Successfully !!"
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
        $photogallery = PhotoGallery::find($id);
        if($photogallery){
            $this->c_id=$photogallery->id;
            $this->photoold = $photogallery->photo;
            $this->title = $photogallery->title;
            $this->status = $photogallery->status;
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
        $photogallery = PhotoGallery::find($id);
        if($photogallery){
            $photogallery->title = $validatedData['title'];
            $photogallery->status = $this->status==1?'1':'0';
            if ($this->photo) {
                if($photogallery->photo)
                {
                    File::delete($photogallery->photo);
                }
                $path = 'uploads/photogallery/';
                $fileName = 'photo-' . time(). '.' . $this->photo->getClientOriginalExtension();
                $this->photo->storeAs($path, $fileName, 'public');
                $photogallery->photo = 'storage/' . $path . $fileName;
                $this->reset('photo');
            }
            $photogallery->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Photo Updated Successfully !!"
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
        $photogallery = PhotoGallery::find($id);
        if($photogallery){
            if($photogallery->photo)
            {
                File::delete($photogallery->photo);
            }
            $photogallery->delete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Photo Deleted Successfully !!"
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
        $photogallery = PhotoGallery::withTrashed()->find($id);
        if($photogallery){
            if($photogallery->photo)
            {
                File::delete($photogallery->photo);
            }
            $photogallery->restore();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Photo Restored Successfully !!"
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
        $photogallery = PhotoGallery::withTrashed()->find($this->delete_id);
        if($photogallery){
            if($photogallery->photo)
            {
                File::delete($photogallery->photo);
            }
            $photogallery->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatchBrowserEvent('alert',[
                'type'=>'success',
                'message'=>"Photo Deleted Successfully !!"
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
        $status = PhotoGallery::find($id);
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
        $photogalleries=PhotoGallery::select('id','photo','title','status','deleted_at')->when($this->search, function ($query) {
            return $query->where('title', 'like', '%' . $this->search . '%');
        })->withTrashed()->orderBy('title', 'ASC')->paginate($this->per_page);

        return view('livewire.backend.photo-gallery.all-photo-gallery',compact('photogalleries'))->extends('layouts.admin.admin')->section('admin');
    }

}
