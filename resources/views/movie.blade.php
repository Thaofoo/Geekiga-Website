@extends('layouts.loggedtemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/movie.css') }}">
<title> Geekiga - {{ $title }}</title>
@endsection

@section('content')

    <div class="movie">
        <img class="movie_image" draggable="false" src="{{ asset('images/headers/'.$movie->slug.'.png') }}">
        <div class="movie_title">
            <div class="movie_title_inside">
                <img class="movie_title_img" draggable="false" src="{{ asset('images/titles/'.$movie->slug.'.png') }}">
                <div class="movie_description">
                    <div class="movie_subdesc">
                        {{ $movie["subdesc"] }} • <span>{{

                            


                            }}</span>
                    </div>
                    <div class="movie_desc">
                        {{ $movie["desc"] }}
                    </div>
                    <a href="#" class="movie_play">
                        <img src="{{ asset('interface_assets/tri.svg') }}">
                        <img src="{{ asset('interface_assets/Line.svg') }}">
                        Play Now
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="suggestion">

    </div>

@endsection
