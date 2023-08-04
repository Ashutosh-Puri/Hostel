<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />

    <meta content="Coderthemes" name="author" />
   
    <!-- App favicon -->
    <link rel="shortcut icon" href="  ">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{preg_replace('/(?<!\ )[A-Z]/', ' $0', config('app.name', 'Laravel'))  }} | @yield('title')</title>


    <!-- 1 Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"  type="text/css" >

    <!-- 2 Icons -->
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}"  type="text/css" >


    <!-- 3 Jquery-->
    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <!-- 4 Toastr CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}"  type="text/css" >


    <!-- 5 Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <!-- 6 Admin Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css" id="app-style">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles-->
    @livewireStyles()
</head>
<body>
    <div id="app">
        <main class="">
            @yield('content')
        </main>
    </div>

    <!-- Livewire JS -->
    @livewireScripts()

   

  

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    

    <!-- Toastr JS -->
    <script type="text/javascript" src="{{ asset('assets/js/toastr.min.js') }}"></script>
    <script>
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        @if(Session::has('message'))

        dd(Session::get('message'));
            var type = "{{ Session::get('alert-type','info') }}"

            switch(type){

                case 'info':
                toastr.info(" {{ json_encode(Session::get('message'));  }} ");
                break;

                case 'success':
                toastr.success(" {{ json_encode(Session::get('message'));  }}  ");
                break;

                case 'warning':
                toastr.warning(" {{ json_encode(Session::get('message'));  }}  ");
                break;

                case 'error':
                toastr.error(" {{ json_encode(Session::get('message'));  }}  ");
                break;
            }

        @endif

    </script>


    <!-- Sweet Alert JS -->
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>



    <!-- Template JS-->
    <script type="text/javascript" src="{{ asset('assets/js/app.min.js') }}"></script> 


    @yield('scripts')
</body>
</html>
