@extends('layouts.guest.guest')
@section('guest')
@section('title')
Admin Register
@endsection
<div class="container-fluid page-body-wrapper bg-img d-flex align-items-center">
    <div class="content-wrapper w-100">
        <div class="row justify-content-center">
            <div class="col-lg-4">
                <div class="modal-bg p-5 my-5">
                    <div>
                        <h1 class="text-center fw-bold fs-1 mb-3 text-primary"> Admin Register</h1>
                    </div>
                    <div>
                        @if (session('status'))
                            <div class="alert alert-success mb-4">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf
                        <div class="form-group">
                            <input name="name" type="text" id="name" class="form-control form-control @error('name') is-invalid @enderror"  value="{{ old('name') }}" required autofocus autocomplete="name"placeholder="Username">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" id="email"  class="form-control form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" required autofocus autocomplete="email"placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" class="form-control @error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password"  placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" required autocomplete="password_confirmation"  placeholder="Confirm Password">
                            @error('password_confirmation')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <button type="submit" class="btn btn-lg bg-primary btn-primary ">Register</button>
                                </div>
                                <div class="col py-2">
                                    <a href="{{ route('admin.login') }}" class="form-check-label mx-2 ">Already registered?</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


