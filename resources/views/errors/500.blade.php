@extends('layouts.app')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/admin_template/css/style.css') }}">
@endsection
@section('content')
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center text-center error-page bg-primary">
            <div class="row flex-grow">
                <div class="col-lg-7 mx-auto text-white">
                    <div class="row align-items-center d-flex flex-row">
                        <div class="col-lg-6 text-lg-right pr-lg-4">
                            <h1 class="display-1 mb-0">500</h1>
                        </div>
                        <div class="col-lg-6 error-page-divider text-lg-left ps-lg-4">
                            <h2>SORRY !!</h2>
                            <h3 class="font-weight-light">Internal Server Error!</h3>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 text-center mt-xl-2">
                            <a class="text-white font-weight-medium btn btn-success" href="{{ route('home') }}">Back To Home</a>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 mt-xl-2">
                            <p class="text-white font-weight-medium text-center">Copyright &copy; 2023 All Rights Reserved.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection