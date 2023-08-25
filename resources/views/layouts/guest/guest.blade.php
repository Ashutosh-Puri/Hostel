@extends('layouts.app')
@section('content')

<!-- body start -->
<body>
    <div id="wrapper">
        @include('layouts.guest.navbar')
        <div class="content-page" style="background-color: #b4b9ea;">
           @yield('guest')
        </div>
        @include('layouts.guest.footer')
    </div>
</body>
@endsection
