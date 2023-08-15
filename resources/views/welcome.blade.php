@extends('layouts.guest.guest')
@section('guest')
Welcome
@php
    $cast=App\Models\Cast::all();
    $category=App\Models\Category::all();

@endphp
<table class="table bg-dark text-danger" style="color:black;">
    <tr>
        <th>Cast</th>
        <th>Category</th>
    </tr>
    @foreach ($cast as $c)
    <tr>
        <td>{{ $c->name }}</td>
        <td>{{ $c->category->name }}</td>
    </tr>@break
    @endforeach
</table>
@endsection

