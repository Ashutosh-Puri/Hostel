<?php

namespace App\Http\Livewire\Backend\Razorpay;

use Razorpay\Api\Api;
use Livewire\Component;

class RazorpayPayments extends Component
{   
    protected $api;

    public function mount()
    {
        $this->api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
    }

    public function render()
    {   
        $payments=$this->api->payment->all(array('count'=>100));
        return view('livewire.backend.razorpay.razorpay-payments',compact('payments'))->extends('layouts.admin.admin')->section('admin');
    }
}
