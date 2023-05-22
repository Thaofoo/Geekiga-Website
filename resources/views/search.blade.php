@extends('layouts.loggedtemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/search.css') }}">
<title> Geekiga - {{ $title }}</title>
@endsection

@section('content')

<div class="genre_header">

    <h1><span>Result For: {{ $name }}</span></h1>

</div>

<div class="posters_container">

    @if ($movies->isEmpty())
    <div class="noResult"> No Result </div>
    @endif

    @foreach ($movies as $movie)

    <a href="{{ URL::to("/movies/".$movie->slug) }}" class="poster_clip" style="background-image: url('{{ asset('images/posters/'.$movie->slug.'.jpg') }}')"></a>

    @endforeach
</div>
@endsection
