@extends('layouts.app')
@section('content')

<!-- body start -->
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
        <div class="content-page" style="background-color: #dbddf1;">
           @yield('guest')
        </div>
        @include('layouts.guest.footer')
    </div>
</body>
@endsection
