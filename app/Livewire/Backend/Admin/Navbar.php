<?php

namespace App\Livewire\Backend\Admin;

use Livewire\Component;
use Livewire\Attributes\On;

class Navbar extends Component
{   
    #[On('update-navbar')] 
    public function render()
    {
        return view('layouts.admin.navbar');
    }
}
