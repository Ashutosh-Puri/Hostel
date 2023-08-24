<?php

namespace App\Http\Livewire\Guestend\Gallery;

use Livewire\Component;
use App\Models\PhotoGallery;
use Livewire\WithPagination;


class Gallery extends Component
{
    use WithPagination;
    public function render()
    {
        $gallery=PhotoGallery::where('status',0)->paginate(8);
        return view('livewire.guestend.gallery.gallery',compact('gallery'))->extends('layouts.guest.guest')->section('guest');
    }
}
