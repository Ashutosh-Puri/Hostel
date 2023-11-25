<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
   
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/logo/favicon.ico') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Title -->
    <title>{{preg_replace('/(?<!\ )[A-Z]/', ' $0', config('app.name', 'Laravel'))  }} | @yield('title')</title>
    <!-- admin template -->     <link rel="stylesheet" href="{{ asset('assets/admin_template/vendors/mdi/css/materialdesignicons.min.css') }}">                                                <!-- admin template -->
    @auth
        <!-- admin template -->
        <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --><!-- admin template --> 
        <!-- admin template 1-->     <link rel="stylesheet" href="{{ asset('assets/admin_template/vendors/flag-icon-css/css/flag-icon.min.css') }}">                                   <!-- admin template -->
        <!-- admin template 1-->     <link rel="stylesheet" href="{{ asset('assets/admin_template/vendors/css/vendor.bundle.base.css') }}">                                             <!-- admin template -->
        <!-- admin template 1-->     <link rel="stylesheet" href="{{ asset('assets/admin_template/vendors/font-awesome/css/font-awesome.min.css') }}">                                   <!-- admin template -->
        <!-- admin template 1-->     <link rel="stylesheet" href="{{ asset('assets/admin_template/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">                        <!-- admin template -->
        <!-- admin template -->      <link rel="stylesheet" href="{{ asset('assets/admin_template/css/style.css') }}">                                                                             <!-- admin template -->                                                                                                                                                                        <!-- admin template -->
        <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --><!-- admin template --> 
    @endauth 

    <!-- data Table-->
    {{-- <link rel="stylesheet" href="{{ asset('assets/datatable/jquery.dataTables.min.css') }}"> --}}
   
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Styles-->
    @yield('styles')
    @stack('styles')

    <!-- Livewire Styles-->
    @livewireStyles()
</head>
<body>
    <div id="app">
        @yield('content')
    </div>

    <!-- Livewire JS -->
    @livewireScripts()

    <!-- Livewire Turbolinks -->
    <script src="{{ asset('assets/turbolinks/turbolinks.js') }}" data-turbolinks-eval="false" data-turbo-eval="false"></script>   

    @auth
        <!-- admin template -->
        <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --><!-- admin template -->
        <!-- admin template -->     <script src="{{ asset('assets/admin_template/vendors/js/vendor.bundle.base.js') }}"></script>                                        <!-- admin template -->
        <!-- admin template 1-->    <script src="{{ asset('assets/admin_template/vendors/chart.js/Chart.min.js') }}"></script>                                  <!-- admin template -->
        <!-- admin template 1-->    <script src="{{ asset('assets/admin_template/vendors/jquery-circle-progress/js/circle-progress.min.js') }}" ></script>        <!-- admin template -->
        <!-- admin template 1-->    <script src="{{ asset('assets/admin_template/js/jquery.cookie.js') }}" type="text/javascript"></script>                                            <!-- admin template -->
        <!-- admin template -->     <script src="{{ asset('assets/admin_template/js/off-canvas.js') }}" ></script>                                                        <!-- admin template -->
        <!-- admin template 1-->    <script src="{{ asset('assets/admin_template/js/hoverable-collapse.js') }}" ></script>                                     <!-- admin template -->
        <!-- admin template -->     <script src="{{ asset('assets/admin_template/js/misc.js') }}" ></script>   @yield('dashboard')                                                           <!-- admin template -->
        {{-- <!-- admin template 1-->     <script src="{{ asset('assets/admin_template/js/dashboard.js') }}" ></script>                                                 <!-- admin template --> --}}
        <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --> <!-- admin template --><!-- admin template -->
    @endauth
        
    <!-- data Table-->
    {{-- <script src="{{ asset('assets/datatable/jquery.dataTables.min.js') }}"></script> --}}

    <!-- bootstrap  -->
    <script src="{{ asset('assets/bootstrap/bootstrap.min.js') }}"></script>
    
    <!-- jquery -->
    <script src="{{ asset('assets/jquery/jquery-3.6.0.min.js') }}"></script>

    <!-- Sweet Alert JS -->
    <script src="{{ asset('assets/sweetalert/sweetalert.js') }}"></script>
    <script>
            // Toster Config
            var Toast = Swal.mixin({
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
            
            // Notification Fire
            window.addEventListener('alert',({detail:{type,message}})=>{
                Toast.fire({
                    icon:type,
                    title:message
                })

            });
            
            // Delete Fire
            window.addEventListener('delete-confirmation',event=>{
                Swal.fire({
                    title: 'Are You Sure?',
                    text: "You Won't Be Able To Revert This!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#198754',
                    confirmButtonText: 'Yes, Delete It !'
                }).then((result) => {
                    if (result.isConfirmed) {
                    Livewire.emit('delete-confirmed')
                    }
                });
            });
    </script>
    <script>
            @if(session('alert'))
                const toastEvent = @json(session('alert'));
                Toast.fire({
                    icon: toastEvent.type,
                    title: toastEvent.message
                });
                @php session()->forget('alert') @endphp
            @endif
    </script>
    
    @yield('scripts')
</body>
</html>
