@extends('layouts.guest.guest')
@section('guest')
@section('title')
Unauthorized Access
@endsection
@if (session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="container">
    <div class="row justify-content-center align-items-center vh-100">
      <div class="col-md-6">
        <div class="card">
          <div class="card-body text-center">
            <h5 class="card-title">Unauthorized Access</h5>
            <p class="card-text">Your Trying To Access Admin Dashboard</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection