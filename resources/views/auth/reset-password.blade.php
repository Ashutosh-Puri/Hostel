@extends('layouts.guest.guest')
@section('guest')
    @section('title')
        Password Reset
    @endsection
    <div class="container-fulid page-body-wrapper">
        <div class="content-wrapper d-flex align-items-center auth py-0">
            <div class="row flex-grow ">
                <div class="col-lg-4 mx-auto">
                    <div class="auth-form-light   p-5">
                        <div>
                            <h1 class="text-center fw-bold fs-1 mb-3"> Password Reset</h1>
                        </div>
                        <div>
                            <form method="POST" action="{{ route('password.store') }}">
                                @csrf
                                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                <div class="form-group">
                                    <label for="email" class="form-label">{{ __('Email') }}</label>
                                    <input id="email" class="form-control" type="email" name="email" value="{{ old('email', $request->email) }}" required autocomplete="username">
                                    @if ($errors->has('email'))
                                        <div class="invalid-feedback d-block">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password">
                                    @if ($errors->has('password'))
                                        <div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                                    <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autocomplete="new-password">
                                    @if ($errors->has('password_confirmation'))
                                        <div class="invalid-feedback d-block">{{ $errors->first('password_confirmation') }}</div>
                                    @endif
                                </div>
                                <div class="form-group float-end mb-4">
                                    <button type="submit" class="btn btn-primary bg-primary">{{ __('Reset Password') }}</button>
                                </div>
                            </form>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection 