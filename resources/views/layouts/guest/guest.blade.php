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

        .modal-bg .form-control
        {
            font-family: "nunito-regular", sans-serif;
            font-size: 12px;
            height: 45px;
            margin-bottom: 10px;
            background-color: transparent;
            font-weight: bold;
            border: 1px solid lime;
            
        }
        .model-bg{
            margin-top: 100px;
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
            opacity: 1;
            border: 3px solid lime;
        }

        .modal-bg input::placeholder {
            color: white;
        }

        .modal-bg input{
            color:lime;
        }

        .modal-bg  input:focus{
            color:lime;
            background-color: transparent;
        }





    /* gallery */

    .gallery-item {
                background: #fff;
                padding: 15px;
                width: 100%;
                box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.3);
                cursor: pointer;
            }

            .image-container {
                position: relative;
                display: inline-block;
            }

            .image-caption {
                position: absolute;
                bottom: 0;
                left: 0px;
                width: 100%;
                padding: 10px;
                background-color: rgba(0, 0, 0, 0.9);
                color: white;
                opacity: 0;
                transition: opacity 0.1s;
            }

            .image-container:hover .image-caption {
                opacity: 1;
            }




        select  option {
          padding: 5px 0 !important;
          color: black;
          background-color: white;
        }

        textarea {
         color: black;
          background-color: white;
        }



        .scan .card {
            border: 1px solid #ccc;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
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
   
    
    <div id="wrapper">
        @include('layouts.guest.navbar')
        <div class="content-page guest-bg" >
           @yield('guest')
        </div>
        @include('layouts.guest.footer')

        @section('scripts')
            <!-- JavaScript Libraries -->
            <script src="{{ asset('assets/guest_template/lib/wow/wow.min.js') }}"></script>
            <script src="{{ asset('assets/guest_template/lib/easing/easing.min.js') }}"></script>
            <script src="{{ asset('assets/guest_template/lib/waypoints/waypoints.min.js') }}"></script>
            <script src="{{ asset('assets/guest_template/lib/owlcarousel/owl.carousel.min.js') }}"></script>
            <!-- Template Javascript -->
            <script src="{{ asset('assets/guest_template/js/main.js') }}"></script>
        @endsection
    </div>
</body>
@endsection
