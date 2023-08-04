@extends('layouts.admin')

@section('admin')

<h6>

    Admin Dashboard  {{ auth()->user()->name }}


   
</h6>
@endsection