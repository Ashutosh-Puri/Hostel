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

    <!-- Plugins css -->
    {{-- <link href="{{ asset('assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/mohithg-switchery/switchery.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/multiselect/css/multi-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" /> --}}

    <!-- 1 Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}"  type="text/css" >

    <!-- 2 Icons -->
    <link rel="stylesheet" href="{{ asset('assets/css/icons.min.css') }}"  type="text/css" >

    <!-- Head js -->
    {{-- <script src="{{ asset('assets/js/head.js') }}"></script> --}}

    <!-- 3 Jquery-->
    <script type="text/javascript" src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>

    <!-- 4 Toastr CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}"  type="text/css" >

    <!-- Datatable CSS -->
    <link href="{{ asset('assets/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/libs/datatables.net-select-bs5/css//select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />

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
      
    <!-- Plugins js-->
    {{-- <script src="{{ asset('assets/libs/flatpickr/flatpickr.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('assets/libs/selectize/js/standalone/selectize.min.js') }}"></script> --}}
        
    <!-- Dashboard 1 init js-->
    {{-- <script src="{{ asset('assets/js/pages/dashboard-1.init.js') }}"></script> --}}

    <!-- Validate js-->
    
    {{-- <script src="{{ asset('assets/js/validate.min.js') }}"></script> --}}

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

            var type = "{{ Session::get('alert-type','info') }}"

            switch(type){

                case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

                case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

                case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

                case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
            }

        @endif

    </script>
       <!-- third party js -->
       <script src="{{ asset('assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
       <script src="{{ asset('assets/libs/datatables.net-select/js/dataTables.select.min.js') }}"></script>
       <script src="{{ asset('assets/libs/pdfmake/build/pdfmake.min.js') }}"></script>
       <script src="{{ asset('assets/libs/pdfmake/build/vfs_fonts.js') }}"></script>

    <!-- Datatables init -->
    <script src="{{ asset('assets/js/pages/datatables.init.js') }}"></script>

    <!-- Sweet Alert JS -->
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>

    {{-- <script src="{{ asset('assets/js/code.js') }}"></script>
    <script src="{{ asset('assets/libs/mohithg-switchery/switchery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/multiselect/js/jquery.multi-select.js') }}"></script>
    <script src="{{ asset('assets/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/libs/devbridge-autocomplete/jquery.autocomplete.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap-maxlength/bootstrap-maxlength.min.js') }}"></script> --}}

    <!-- Init js-->
    {{-- <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script> --}}

    <!-- Template JS-->
    <script type="text/javascript" src="{{ asset('assets/js/app.min.js') }}"></script> 


   
</body>
</html>
