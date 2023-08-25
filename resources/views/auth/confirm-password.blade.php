@extends('layouts.guest.guest')
@section('guest')
@section('title')
    Confirm Password
@endsection
<div class="container-fulid page-body-wrapper">
    <div class="content-wrapper d-flex align-items-center auth py-0">
        <div class="row flex-grow ">
            <div class="col-lg-4 mx-auto">
                <div class="bg-light p-5">
                    <div>
                        <h1 class="text-center fw-bold fs-1 mb-3">  Confirm Password</h1>
                    </div>
                    <div>
                        {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
                    </div>
                    <form method="POST" action="{{ route('password.confirm') }}">
                        @csrf
                        <div class="form-group">
                            <label for="password" class="form-label">{{ __('Password') }}</label>
                            <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password">
                            @if ($errors->has('password'))
                                <div class="invalid-feedback d-block">{{ $errors->first('password') }}</div>
                            @endif
                        </div>
                        <div class="form-group float-end mb-4">
                            <button type="submit" class="btn btn-primary bg-primary">{{ __('Confirm') }}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
