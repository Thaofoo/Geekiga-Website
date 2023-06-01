@extends('layouts.admintemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/genres.css') }}">
<title> Geekiga Admin - {{ $title }} </title>
@endsection

@section('content')

<h1>Genres</h1>

<hr>

<ul class="genre-container">
    @foreach ($genres as $genre)

    <li>
        <a class="genre-link" href="{{ URL::to("/admin/genre/".$genre->slug) }}">
            {{ $genre->name }}
        </a>
    </li>

    @endforeach

    <li>
        <a class="genre-link" href="{{ URL::to("/admin/genre/add") }}">
            <img src="{{ asset('interface_assets/genre_add.svg') }}" height="15px"> Add Genre
        </a>
    </li>
</ul>

@endsection
