@extends('layouts.student')

@section('student')

<h6>

    Student Dashboard  {{ auth()->user()->name }}




</h6>
<br> <a class="btn btn-success" href="{{ url('admin/dashboard') }}"> Admin Dashbaord  </a>
@endsection