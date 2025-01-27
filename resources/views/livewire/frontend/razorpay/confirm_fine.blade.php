@extends('layouts.student.student')
@section('title')
    Confirm Payment
@endsection
@section('student')
<div class="container-fulid page-body-wrapper  bg-img">
    <div class="content-wrapper d-flex align-items-center auth py-0">
        <div class="row flex-grow ">
            <div class="col-lg-6 mx-auto border border-3 border-success">
                <div class="modal-bg p-3">
                    <div>
                        <h1 class="text-center fw-bold fs-1 mb-3">Confirm Fine</h1>
                    </div>
                    <div class="row mb-3">
                        <hr>
                        <div class="col-12 col-md-4 mb-2">
                            <span for="" class="form-control w-100 text-white">Order ID :   </span>
                        </div>
                        <div class="col-12 col-md-8 mb-2">
                            <span class="form-control fw-bold w-100 text-white">{{ $order->id }} </span>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-12 col-md-4 mb-2">
                            <span for="" class="form-control w-100 text-white">Amount :   </span>
                        </div>
                        <div class="col-12 col-md-8 mb-2">
                            <span class="form-control fw-bold w-100 text-white">  {{ number_format($order->amount / 100, 2)  }} &nbsp;&nbsp;&nbsp;&nbsp;  Rs.</span>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <hr>
                        <div class="col-12 text-center ">
                            <form name="razorpayfineform" action="{{ route('student_fine_payment_verify') }}" method="post">
                                @csrf
                                <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                                <input type="hidden" name="razorpay_order_id" id="razorpay_order_id">
                                <input type="hidden" name="razorpay_signature" id="razorpay_signature">
                            </form>
                            <form name="paymentfinefail" action="{{ route('student_fine_payment_fail') }}" method="post">
                                @csrf
                                <input type="hidden" name="error_razorpay_payment_id" id="fine_error_razorpay_payment_id">
                                <input type="hidden" name="error_razorpay_order_id" id="fine_error_razorpay_order_id"> 
                            </form>
                            <div class="row mb-3">
                                <div class="col-12 col-md-4 mb-2">
                                    <a  wire:navigate href="{{ route('student.student_fine') }}" class="btn btn-lg w-100 btn-danger" > Cancel </a>
                                </div>
                                <div class="col-12 col-md-8 mb-2">
                                    <button type="submit" class="btn btn-lg w-100 btn-success" id="rzp-button1"  onclick="return rzp2.open();"> Pay  With Razorpay</button>
                                </div>
                            </div>
                            @section('scripts')
                                <script src="https://checkout.razorpay.com/v1/checkout.js" ></script>
                                <script>
                                    var options = @json($jsondata);
                                    
                                    options.handler= function (response){
                                        document.getElementById('razorpay_payment_id').value=response.razorpay_payment_id;
                                        document.getElementById('razorpay_order_id').value=response.razorpay_order_id;
                                        document.getElementById('razorpay_signature').value=response.razorpay_signature;
                                        document.razorpayfineform.submit();
                                    };
                                    var rzp2 = new Razorpay(options);
                                    rzp2.on('payment.failed', function (response){
                                        document.getElementById('fine_error_razorpay_payment_id').value=response.error.metadata.payment_id;
                                        document.getElementById('fine_error_razorpay_order_id').value=response.error.metadata.order_id;
                                        document.paymentfinefail.submit();
                                    });

                                    // document.getElementById('rzp-button1').onclick = function(e){
                                    //     rzp2.open();
                                    //     e.preventDefault();
                                    // }
                                </script>
                            @endsection
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
