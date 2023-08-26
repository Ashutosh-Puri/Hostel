@extends('layouts.app')
@section('content')
@section('styles')
    <style>
        .content-wrapper {

        height: calc(100vh - 57px);
        padding: 30px 30px 40px 30px;
        width: 100%;
        -webkit-box-flex: 1;
        -ms-flex-positive: 1;
        flex-grow: 1;
    }
    </style>
@endsection
<body>
    @section('scripts')
    <style>
        .form-control 
        {
            font-family: "nunito-regular", sans-serif;
            font-size: 12px;
            height: 45px;
        }
    </style>
    @endsection
    <div id="wrapper">
        @include('layouts.guest.navbar')
        <div class="content-page" style="background-color: #b4b9ea;">
           @yield('guest')
        </div>
        @include('layouts.guest.footer')
    </div>
</body>
@endsection
