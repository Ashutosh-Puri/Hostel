@extends('layouts.app')
@section('content')

<!-- body start -->
<body data-layout-mode="default" data-theme="dark" data-topbar-color="dark" data-menu-position="fixed" data-leftbar-color="dark" data-leftbar-size='default' data-sidebar-user='false'>

    <!-- Begin page -->
    <div id="wrapper">
    @include('layouts.header')

        @include('layouts.sidebar')
        <div class="content-page py-4">
           @yield('admin')

            @include('layouts.footer')
        </div>
    </div>
</body>
@endsection