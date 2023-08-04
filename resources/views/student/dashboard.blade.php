@extends('layouts.student')

@section('student')

<h6>

    Student Dashboard  {{ auth()->user()->name }}
</h6>
@endsection