<?php

namespace App\Livewire\Backend\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class AllCategory extends Component
{
    use WithPagination;
    
    protected $listeners = ['delete-confirmed'=>'delete'];
    public $delete_id=null;
    public $search = '';
    public $per_page = 10;
    public $mode='all';
    public $name;
    public $c_id;
    public $current_id;

    protected function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255','unique:categories,name,'.($this->mode=='edit'? $this->current_id :'')],
        ];
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function resetinput()
    {
        $this->name=null;
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
        $category= new Category;
        if($category){
            $category->name = $validatedData['name'];
            $category->save();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Category Created Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function edit(Category $category)
    {
        if($category)
        {
            $this->current_id=$category->id;
            $this->c_id=$category->id;
            $this->name = $category->name;
            $this->setmode('edit');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function update(Category $category)
    {
        $validatedData = $this->validate();
        if($category){
            $category->name = $validatedData['name'];
            $category->update();
            $this->resetinput();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Category Updated Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function deleteconfirmation($id)
    {
        $this->delete_id=$id;
        $this->dispatch('delete-confirmation');
    }

    public function softdelete(Category $category)
    {
        if($category){
            $category->delete();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Category Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function restore($id)
    {
        $category = Category::withTrashed()->find($id);
        if($category){
            $category->restore();
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Category Restored Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function delete()
    {
        $category = Category::withTrashed()->find($this->delete_id);
        if($category){
            $category->forceDelete();
            $this->delete_id=null;
            $this->setmode('all');
            $this->dispatch('alert',type:'success',message:'Category Deleted Successfully !!');
        }else{
            $this->dispatch('alert',type:'error',message:'Something Went Wrong !!');  
        }
    }

    public function render()
    {   
        if($this->mode=='all')
        {
            $this->resetinput();
        }
        
        $category= Category::query()->select('id','name','deleted_at') ->when($this->search, function ($query) {
            return $query->where('name', 'like', '%' . $this->search . '%');
        })->withTrashed()->orderBy('name', 'ASC')->paginate($this->per_page);

        return view('livewire.backend.category.all-category',compact('category'))->extends('layouts.admin.admin')->section('admin');
    }
}
