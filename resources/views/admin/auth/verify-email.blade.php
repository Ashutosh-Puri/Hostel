

@extends('layouts.guest.guest')
@section('guest')
    @section('title')
        Verify Email
    @endsection
    <div class="container-fulid page-body-wrapper">
        <div class="content-wrapper d-flex align-items-center auth py-0">
            <div class="row flex-grow ">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light   p-5">
                        <div>
                            <h1 class="text-center fw-bold fs-1 mb-3"> Verify Email</h1>
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
                                    <div class="col">
                                        <form method="POST" action="{{ route('admin.logout') }}">
                                            @csrf
                                            <button type="submit" class="btn bg-danger btn-danger">
                                                {{ __('Log Out') }}
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col">
                                        <form method="POST" action="{{ route('admin.verification.send') }}">
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
