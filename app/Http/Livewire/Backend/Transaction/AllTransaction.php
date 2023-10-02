<?php

namespace App\Http\Livewire\Backend\Transaction;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;

class AllTransaction extends Component
{   
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $per_page = 10;
    public $student_name='';
    public $payment_id='';
    public $refund_id='';
    public $order_id='';
    public $status=null;

    public function render()
    {   
        $transactions = Transaction::query()->with('student')->when($this->payment_id, function ($query) {
            return $query->where('razorpay_payment_id', 'like', $this->payment_id);
        })->when($this->refund_id, function ($query) {
            return $query->where('razorpay_refund_id', 'like', $this->refund_id);
        })->when($this->order_id, function ($query) {
            return $query->where('order_id', 'like', $this->order_id);
        })->when($this->status !== null, function ($query) {
            return $query->where('status',$this->status);
        })->when($this->student_name, function ($query) {
            return $query->whereHas('student', function ($subquery) {
                $subquery->where('name', 'like', '%' . $this->student_name . '%');
            });
        })->orderBy('updated_at','DESC')->paginate($this->per_page);


        return view('livewire.backend.transaction.all-transaction',compact('transactions'))->extends('layouts.admin.admin')->section('admin');
    }

}
