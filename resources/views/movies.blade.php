@extends('layouts.loggedtemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/movies.css') }}">
<title> Geekiga - {{ $title }}</title>
@endsection

@section('content')

<div class="posters_container">
    @foreach ($movies as $movie)

    <a href="{{ URL::to("/movies/".$movie->slug) }}" class="poster_clip" style="background-image: url('{{ asset('storage/images/poster/'.$movie->posterimg) }}')"></a>

    @endforeach
</div>
@endsection

