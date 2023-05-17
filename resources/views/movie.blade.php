@extends('layouts.loggedtemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/movie.css') }}">
<title> Geekiga - {{ $movie->title }}</title>
@endsection

@section('content')

    <div class="movie">
        <img class="movie_image" draggable="false" src="{{ asset('images/headers/'.$movie->slug.'.png') }}">
        <div class="movie_title">
            <div class="movie_title_inside">
                <img class="movie_title_img" draggable="false" src="{{ asset('images/titles/'.$movie->slug.'.png') }}">
                <div class="movie_description">
                    <div class="movie_subdesc">
                        {{ $movie["subdesc"] }} •
                            @foreach ($genres as $genre)
                            @if ($genre != $genres->last())
                            <a class="genre_link" href="{{ URL::to('/genre')."/".$genre->name }}">{{ trim($genre->name)."," }}</a>
                            @else
                            <a class="genre_link" href="{{ URL::to('/genre')."/".$genre->name }}">{{ trim($genre->name) }}</a>
                            @endif
                            @endforeach
                    </div>
                    <div class="movie_desc">
                        {{ $movie["desc"] }}
                    </div>
                    <div class="container_button">
                        <a href="#" class="movie_play">
                            <img src="{{ asset('interface_assets/tri.svg') }}">
                            <img src="{{ asset('interface_assets/Line.svg') }}">
                            Play Now
                        </a>
                        <form action="/movies/{{ $movie->slug }}" method="POST">
                        @csrf
                        <button type="submit" class="add_button"><img class="add_logo" src="{{ asset('interface_assets/'.$logo.".svg") }}" height="28px"></button>
                        </form>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <div class="suggestion">

    </div>

@endsection
