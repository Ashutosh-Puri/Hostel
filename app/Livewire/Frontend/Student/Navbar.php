<?php

namespace App\Livewire\Frontend\Student;

use Livewire\Component;
use Livewire\Attributes\On;

class Navbar extends Component
{   
    #[On('update-student-navbar')] 
    public function render()
    {
        return view('layouts.student.navbar');
    }
}
