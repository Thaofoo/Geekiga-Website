@extends('layouts.loggedtemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/genre.css') }}">
<title> Geekiga - {{ $title }}</title>
@endsection

@section('content')

<div class="genre_header">

    <h1><span>{{ ucfirst($name) }}</span></h1>

</div>

<div class="posters_container">
    @foreach ($movies as $movie)

    <a href="{{ URL::to("/movies/".$movie->slug) }}" class="poster_clip" style="background-image: url('{{ asset('storage/images/poster/'.$movie->slug.'.jpg') }}')"></a>

    @endforeach
</div>
@endsection

