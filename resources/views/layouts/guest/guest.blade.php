@extends('layouts.app')
@section('content')

<!-- body start -->
<body>

    <!-- Begin page -->
    <div id="wrapper">
    @include('layouts.navbar')
        <div class="content-page" style="background-color: #dbddf1;">
           @yield('guest')
        </div>
    </div>
</body>
@endsection
