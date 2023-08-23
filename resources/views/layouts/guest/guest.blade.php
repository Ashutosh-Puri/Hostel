@extends('layouts.app')
@section('content')

<!-- body start -->
<body>
    <div id="wrapper">
        @include('layouts.guest.navbar')
        <div class="content-page" style="background-color: #dbddf1;">
           @yield('guest')
        </div>
        @include('layouts.guest.footer')
    </div>
</body>
@endsection
