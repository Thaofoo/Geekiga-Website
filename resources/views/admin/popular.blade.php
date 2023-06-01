@extends('layouts.admintemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/movies.css') }}">
<title> Geekiga Admin - {{ $title }} </title>
@endsection

@section('content')

<h1>Popular</h1>

<hr>

<div class="button-container">
    <a href="/admin/popular/add" class="button add-movie">
        <img src="{{ asset('interface_assets/movie_add.svg') }}" height="16px"> <p>Add Movie</p>
    </a>
</div>

<div class="button-container">
    <a href="/admin/popular/delete" class="button add-movie">
        <img src="{{ asset('interface_assets/movie_del.svg') }}" height="16px"> <p>Remove Movie</p>
    </a>

</div>

<div class="posters_container">

    @foreach ($movies as $movie)

    <a href="{{ URL::to("/admin/movies/".$movie->slug) }}" class="poster_clip" style="background-image: url('{{ asset('storage/images/poster/'.$movie->posterimg) }}')"></a>

    @endforeach
</div>

@endsection
