<?php

namespace App\Http\Livewire\Backend\Admin;

use Livewire\Component;

class Sidebar extends Component
{   


    public function all_role()
    {
        $this->dispatchBrowserEvent('alert',[
            'type'=>'success',
            'message'=>"Sidebar Successfully!!"
        ]);
        $this->emit('all_role');
    }
    public function render()
    {
        return view('livewire.backend.admin.sidebar');
    }
}
