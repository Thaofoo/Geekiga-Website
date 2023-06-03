@extends('layouts.loggedtemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
<title> Geekiga - {{ $title }}</title>
@endsection

@section('content')

@if (session('unverified'))
<div class="alert unverified" id="alertbox" role="alert">
    <img src="{{ asset("interface_assets/alert.svg") }}" height="140px">
    Email is not verified. Please verify your email in profile page.
    <button class="close_button hero_title_login" onclick="document.getElementById('alertbox').classList.toggle('hide')">Close</button>
</div>
@endif
        <div class="hero">
            <img src="{{ asset('interface_assets/hero_pic.png') }}" width="80%" draggable="false">
            <div class="hero_title">
                <div class="hero_title_featured">
                    Featured Show
                </div>
                <img class="hero_title_wall" src="{{ asset('interface_assets/hero_title.png') }}" width="750px" draggable="false">
                <div class="hero_title_subdesc">
                    {{ $movie->duration }}
                </div>
                <div class="hero_title_desc">
                    {{ $movie["desc"] }}
                </div>
                <a href="{{ URL::to('/movies/chainsaw-man-2020') }}" class="hero_title_login">
                    <img src="{{ asset('interface_assets/tri.svg') }}">
                    <img src="{{ asset('interface_assets/Line.svg') }}">
                    Play Now
                </a>
            </div>
        </div>

        <div class="contents">

            <div class="contents_continue category_container">
                <div class="category_text">Continue Watching</div>
                <div class="thumbnails_container">
                    <div class="thumbnail_segment">
                        <a href="{{ URL::to('/movies/kimetsu-no-yaiba-2019') }}">
                            <div class="thumbnail_clip" style="background-image: linear-gradient(to top, #000000, #ffffff00), url('{{ asset('images/thumbnails/demonslayer.webp') }}')">
                            <div class="progress_bar" id="segment-1"></div>
                            </div>
                            Demon Slayer <span> •  S02 E016 </span>
                        </a>
                    </div>
                        <div class="thumbnail_segment">
                            <a href="{{ URL::to('/movies/shingeki-no-kyojin-2013') }}">
                            <div class="thumbnail_clip" style="background-image: linear-gradient(to top, #000000, #ffffff00), url('{{ asset('images/thumbnails/gabi.jpg') }}')">
                            <div class="progress_bar" id="segment-2"></div>
                            </div>
                            Shingeki No Kyojin <span> •  S06 E01 </span>
                            </a>
                        </div>
                </div>

            </div>

            <div class="contents_popular category_container">
                <div class="category_text">Popular Show</div>
                <div class="posters_container">

                    @php
                        $popularMovies = \App\Models\Movies::where('popular', 1)->get()
                    @endphp

                    @foreach ($popularMovies as $movie)

                    <a href="{{ URL::to("/movies/".$movie->slug) }}" class="poster_clip" style="background-image: url('{{ asset('storage/images/poster/'.$movie->posterimg) }}')"></a>

                    @endforeach

                </div>
            </div>

            @foreach ($genres as $genre)
            <div class="contents_{{ $genre->slug }} category_container">
                <div class="category_text">{{ $genre->name }}</div>
                <div class="posters_container">
                    @foreach ($genre->movies as $movie)

                    <a href="{{ URL::to("/movies/".$movie->slug) }}" class="poster_clip" style="background-image: url('{{ asset('storage/images/poster/'.$movie->posterimg) }}')"></a>

                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
@endsection

