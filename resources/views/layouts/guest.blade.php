@extends('layouts.app')
@section('content')

<!-- body start -->
<body>

    <!-- Begin page -->
    <div id="wrapper">
    @include('layouts.navbar')
        <div class="content-page">
           @yield('guest')


        </div>
    </div>
</body>
@endsection