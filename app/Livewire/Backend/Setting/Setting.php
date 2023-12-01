<?php

namespace App\Livewire\Backend\Setting;

use Livewire\Component;
use Illuminate\Support\Facades\Artisan;

class Setting extends Component
{

    public function removesymboliclink()
    {
        $linkPath = public_path('storage');

        if (is_link($linkPath)) {
            unlink($linkPath);
            $this->dispatch('alert',type:'success',message:'Symbolic Link Deleted Successfully !!');  
        } else {
            $this->dispatch('alert',type:'error',message:'No symbolic link found !!');
        }

        if (is_dir($linkPath)) {
            exec("rd /s /q $linkPath", $output, $returnVar);
    
            if ($returnVar === 0) {
                $this->dispatch('alert',type:'success',message:'Directory Removed Successfully !!');  
            } else {
                $this->dispatch('alert',type:'error',message:'An error occurred while removing the directory !!');  
            }
        }
    }

    public function createsymboliclink()
    {
       
        if( Artisan::call('storage:link'))
        {   
            $this->dispatch('alert',type:'success',message:'Fresh Symbolic Link Genrated Successfully !!');  
        }else
        {   
            $this->dispatch('alert',type:'info',message:'Symbolic Link Already Exists !!');  
        }
    }

    public function render()
    {
        return view('livewire.backend.setting.setting')->extends('layouts.admin.admin')->section('admin');
    }
}