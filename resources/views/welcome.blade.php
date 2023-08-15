<<<<<<< Updated upstream
@extends('layouts.guest.guest')
@section('guest')
Welcome
@endsection
=======
@extends('layouts.student')
@section('student')

@php
    $casts = App\Models\Cast::all();
@endphp

@foreach ($casts as $cast)
{{ $cast->name }}
{{ $cast->category->name }}
@endforeach

@endsection
>>>>>>> Stashed changes
