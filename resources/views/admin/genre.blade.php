@extends('layouts.admintemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/movies.css') }}">
<title> Geekiga Admin - {{ $genre->name }} {{ $title }} </title>
@endsection

@section('content')

<h1>{{ $genre->name }} Movies</h1>

<hr>

<a href="{{ URL::to("/admin/genre/" . $genre->slug . "/add") }}" class="button add-movie">
    <img src="{{ asset('interface_assets/movie_add.svg') }}" height="16px"> <p>Add Movie</p>
</a>

<div class="posters_container">
    @foreach ($movies as $movie)

    <a href="{{ URL::to("/admin/movies/".$movie->slug) }}" class="poster_clip" style="background-image: url('{{ asset('storage/images/poster/'.$movie->posterimg) }}')"></a>

    @endforeach
</div>

@endsection
