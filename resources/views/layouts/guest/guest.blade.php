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

        .form-control
            {
                font-family: "nunito-regular", sans-serif;
                font-size: 12px;
                height: 45px;

            }
            .page-header {
                background: linear-gradient(rgba(24, 29, 56, .2), rgba(24, 29, 56, .2)), url('{{ asset('assets/images/bg.png') }}');
                background-position: center center;
                background-repeat: no-repeat;
                background-size: cover;
            }
            .bg-img {

                margin: 0;
                    padding: 0;
                    background-image: url('{{ asset('assets/images/bg.png') }}');
                    background-size: cover;
                    background-repeat: no-repeat;
                    background-attachment: fixed;
                    height: 100vh;
                    color:white;

            }

            .modal-bg ,input{
                color:white;
                border: 1px solid lime;
                opacity: 1;
            }
            .modal-bg input::placeholder {
                color: white;
            }
            .modal-bg input{
                color:lime;
            }
            .modal-bg  input:focus{
                color:lime;
            }

    </style>

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('assets/guest_template/lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/guest_template/lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{ asset('assets/guest_template/css/bootstrap.min.css') }}">
    
    <!-- Template Stylesheet -->
    <link href="{{ asset('assets/guest_template/css/style.css') }}" rel="stylesheet">
@endsection
<body>  
    @section('scripts')
        <!-- JavaScript Libraries -->
        <script src="{{ asset('assets/guest_template/lib/wow/wow.min.js') }}"></script>
        <script src="{{ asset('assets/guest_template/lib/easing/easing.min.js') }}"></script>
        <script src="{{ asset('assets/guest_template/lib/waypoints/waypoints.min.js') }}"></script>
        <script src="{{ asset('assets/guest_template/lib/owlcarousel/owl.carousel.min.js') }}"></script>

        <!-- Template Javascript -->
        <script src="{{ asset('assets/guest_template/js/main.js') }}"></script>
    @endsection
    
    <div id="wrapper">
        @include('layouts.guest.navbar')
        <div class="content-page guest-bg" >
           @yield('guest')
        </div>
        @include('layouts.guest.footer')
    </div>
</body>
@endsection
