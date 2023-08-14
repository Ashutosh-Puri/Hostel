@extends('layouts.app')
@section('content')

<!-- body start -->
<body >

    <!-- Begin page -->
    <div id="wrapper">
    @include('layouts.navbar')
        <div class="content-page py-4">
           @yield('student')


        </div>
    </div>
</body>
@endsection