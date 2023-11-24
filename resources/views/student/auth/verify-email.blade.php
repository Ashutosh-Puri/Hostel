

@extends('layouts.guest.guest')
@section('guest')
    @section('title')
        Verify Email
    @endsection
    <div class="container-fluid page-body-wrapper bg-img d-flex align-items-center">
        <div class="content-wrapper w-100">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="modal-bg p-5 my-5">
                        <div>
                            <h1 class="text-center fw-bold fs-1 mb-3 text-primary"> Verify Email</h1>
                        </div>
                        <div>
                            <div class="form-group">
                                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                            </div>
                            <div class="form-group">
                                @if (session('status') == 'verification-link-sent')
                                    <div class="alert alert-success mb-4 font-weight-bold">
                                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                                    </div> 
                                 @endif
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-4">
                                        <form method="POST" action="{{ route('student.logout') }}">
                                            @csrf
                                            <button type="submit" class="btn bg-danger btn-danger">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-8">
                                        <form method="POST" action="{{ route('student.verification.send') }}">
                                            @csrf
                                
                                            <div>
                                                <button class="btn bg-primary btn-primary float-end">
                                                    {{ __('Resend Verification Email') }}
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
