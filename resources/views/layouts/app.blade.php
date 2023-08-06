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



    <!-- 5 Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">

    <!-- 6 Admin Dashboard CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}" type="text/css" id="app-style">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- data Table-->
    <link rel="stylesheet" href="{{ asset('assets/datatable/jquery.dataTables.min.css') }}">

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

   
     <!-- data Table-->
     <script src="{{ asset('assets/datatable/jquery.dataTables.min.js') }}"></script>

     

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>
    



    

    <!-- Template JS-->
    <script type="text/javascript" src="{{ asset('assets/js/app.min.js') }}"></script> 
    <script>
         let table = new DataTable('#data-table');
    </script>
    <!-- Sweet Alert JS -->
    <script src="{{ asset('assets/js/sweetalert.js') }}"></script>

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

           
            let table = new DataTable('#data-table');
            
        })

    </script>
    @yield('scripts')
</body>
</html>
