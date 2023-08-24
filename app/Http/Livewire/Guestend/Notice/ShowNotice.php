<?php

namespace App\Http\Livewire\Guestend\Notice;

use App\Models\Notice;
use Livewire\Component;
use Livewire\WithPagination;

class ShowNotice extends Component
{   
    use WithPagination;
    public function render()
    {   
        $notice=Notice::where('status',0)->orderBy('created_at',"DESC")->paginate(21);
        return view('livewire.guestend.notice.show-notice',compact('notice'));
    }
}