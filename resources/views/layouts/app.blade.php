<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   
    <!-- App favicon -->
    <link rel="shortcut icon" href="  ">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{preg_replace('/(?<!\ )[A-Z]/', ' $0', config('app.name', 'Laravel'))  }} | @yield('title')</title>

    <!-- admin template -->
    <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --><!-- admin template --> 
    <!-- admin template -->     <link rel="stylesheet" href="{{ asset('assets/admin_template/vendors/mdi/css/materialdesignicons.min.css') }}">                                                <!-- admin template -->
    <!-- admin template 1-->     <link rel="stylesheet" href="{{ asset('assets/admin_template/vendors/flag-icon-css/css/flag-icon.min.css') }}">                                   <!-- admin template -->
    <!-- admin template 1-->     <link rel="stylesheet" href="{{ asset('assets/admin_template/vendors/css/vendor.bundle.base.css') }}">                                             <!-- admin template -->
    <!-- admin template 1-->     <link rel="stylesheet" href="{{ asset('assets/admin_template/vendors/font-awesome/css/font-awesome.min.css') }}">                                   <!-- admin template -->
    <!-- admin template 1-->     <link rel="stylesheet" href="{{ asset('assets/admin_template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">                        <!-- admin template -->
    <!-- admin template -->     <link rel="stylesheet" href="{{ asset('assets/admin_template/css/style.css') }}">                                                                             <!-- admin template -->                                                                                                                                                                        <!-- admin template -->
    <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --><!-- admin template -->
    
    
    <!-- data Table-->
    <link rel="stylesheet" href="{{ asset('assets/datatable/jquery.dataTables.min.css') }}">
   
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles-->
    @yield('styles')

    <!-- Livewire Styles-->
    @livewireStyles()
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Livewire JS -->
    @livewireScripts()

    <!-- admin template -->
    <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --><!-- admin template -->
    <!-- admin template -->     <script src="{{ asset('assets/admin_template/vendors/js/vendor.bundle.base.js') }}"></script>                                        <!-- admin template -->
    <!-- admin template 1-->    <script src="{{ asset('assets/admin_template/vendors/chart.js/Chart.min.js') }}"></script>                                  <!-- admin template -->
    <!-- admin template 1-->    <script src="{{ asset('assets/admin_template/vendors/jquery-circle-progress/js/circle-progress.min.js') }}" ></script>        <!-- admin template -->
    <!-- admin template 1-->    <script src="{{ asset('assets/admin_template/js/jquery.cookie.js') }}" type="text/javascript"></script>                                            <!-- admin template -->
    <!-- admin template -->     <script src="{{ asset('assets/admin_template/js/off-canvas.js') }}" ></script>                                                        <!-- admin template -->
    <!-- admin template 1-->    <script src="{{ asset('assets/admin_template/js/hoverable-collapse.js') }}" ></script>                                      <!-- admin template -->
    <!-- admin template -->     <script src="{{ asset('assets/admin_template/js/misc.js') }}" ></script>                                                              <!-- admin template -->
    <!-- admin template 1-->     <script src="{{ asset('assets/admin_template/js/dashboard.js') }}" ></script>                                                 <!-- admin template -->
    <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --><!-- admin template -->
    
    <!-- data Table-->
    <script src="{{ asset('assets/datatable/jquery.dataTables.min.js') }}"></script>

    <!-- Sweet Alert JS -->
    <script src="{{ asset('assets/sweetalert/sweetalert.js') }}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 3000,
            timerProgressBar:true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });
    
        window.addEventListener('alert',({detail:{type,message}})=>{
            Toast.fire({
                icon:type,
                title:message
            })

        })
    </script>
    @yield('scripts')
</body>
</html>
