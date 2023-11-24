@extends('layouts.guest.guest')
@section('guest')
    @section('title')
        Password Reset Link
    @endsection
    <div class="container-fluid page-body-wrapper bg-img d-flex align-items-center">
        <div class="content-wrapper w-100">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="modal-bg p-5 my-5">
                        <div>
                            <h1 class="text-center fw-bold fs-1 mb-3 text-primary"> Password Reset Link</h1>
                        </div>
                        <div>
                            <div class="form-group">
                                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </div>
                            <div class="form-group">
                                @if (session('status'))
                                    <div class="alert alert-success mb-4 font-weight-bold">
                                        {{ session('status') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <form method="POST" action="{{ route('student.password.email') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email" class="form-label">{{ __('Email') }}</label>
                                        <input id="email" class="form-control" type="email" name="email" value="{{ old('email') }}" required autofocus />
                                        @if ($errors->has('email'))
                                            <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                    <div class="form-group justify-content-end">
                                        <button type="submit" class="btn btn-primary bg-primary">{{ __('Email Password Reset Link') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

