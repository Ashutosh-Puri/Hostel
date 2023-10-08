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


            .guest-bg{
                /* background-color: #f9f0e6; */
                /* background-color: #f7cac9; */
                /* background-color:  #A890FE; */
            }
    </style>
@endsection

<body>

    <div id="wrapper">
        @include('layouts.guest.navbar')
        <div class="content-page guest-bg" >
           @yield('guest')
        </div>
        @include('layouts.guest.footer')
    </div>
</body>
@endsection
