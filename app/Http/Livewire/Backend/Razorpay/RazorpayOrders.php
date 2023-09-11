<?php

namespace App\Http\Livewire\Backend\Razorpay;

use Razorpay\Api\Api;
use Livewire\Component;

class RazorpayOrders extends Component
{   
    protected $api;

    public function mount()
    {
        $this->api = new Api(env('RAZORPAY_KEY_ID'), env('RAZORPAY_KEY_SECRET'));
    }

    public function render()
    {   
        $orders=$this->api->order->all(array('count'=>100));
        return view('livewire.backend.razorpay.razorpay-orders',compact('orders'))->extends('layouts.admin.admin')->section('admin');
    }

}
