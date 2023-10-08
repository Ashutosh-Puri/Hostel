@extends('layouts.guest.guest')
@section('guest')
@section('title')
    Student Login
@endsection
<div class="container-fulid page-body-wrapper  bg-img">
    <div class="content-wrapper d-flex align-items-center auth py-0">
        <div class="row flex-grow ">
            <div class="col-lg-4 mx-auto">
                <div class="modal-bg p-5">
                    <div>
                        <h1 class="text-center fw-bold fs-1 mb-3 text-primary"> Student Login</h1>
                    </div>
                    <div>
                        @if (session('status'))
                            <div class="alert alert-success mb-4">
                                {{ session('status') }}
                            </div>
                        @endif
                    </div>
                    <form method="POST" action="{{ route('student.login') }}" class="pt-3">
                        @csrf
                        <div class="form-group">
                            <input name="email" type="email" id="email"
                                class="form-control form-control @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" required autofocus autocomplete="email"placeholder="Email">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input id="password" class="form-control @error('password') is-invalid @enderror"
                                type="password" name="password" required autocomplete="current-password"
                                placeholder="Password">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <input id="remember_me" type="checkbox" class="form-check-input" name="remember">
                                    <label for="remember_me" class="form-check-label mx-2 mt-2">Remember Me</label>
                                </div>
                                <div class="col">
                                    <a href="{{ route('student.password.request') }}" class="form-check-label mx-2 mt-2">Forgot
                                        Password?</a>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-lg bg-primary btn-primary ">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
