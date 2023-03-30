@extends('layouts.template')
@section('title', 'Geekiga - Geek Out With Geekiga!')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
        <div class="hero">
            <img src="{{ asset('interface_assets/hero_pic.png') }}" width="80%">
            <div class="hero_title">
                <div class="hero_title_featured">
                    Featured Show
                </div>
                <img class="hero_title_wall" src="{{ asset('interface_assets/hero_title.png') }}" width="750px">
                <div class="hero_title_subdesc">
                    2023 • 11 Episodes • 1 Season
                </div>
                <div class="hero_title_desc">
                    Chainsaw Man follows the story of Denji, an impoverished young man who makes a contract that fuses his
                    body with that of a dog-like devil named Pochita, granting him the ability to transform parts of his
                    body into chainsaws.
                </div>
                <a href="{{ URL::to('login') }}" class="hero_title_login">
                    <img src="{{ asset('interface_assets/tri.svg') }}">
                    <img src="{{ asset('interface_assets/Line.svg') }}">
                    Play Now
                </a>
            </div>
        </div>

        <div class="contents">
            <div class="contents_popular category_container">
                <div class="category_text">Popular Show</div>
                <div class="posters_container">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                </div>
            </div>

            <div class="contents_popular category_container">
                <div class="category_text">Popular Show</div>
                <div class="posters_container">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                </div>
            </div>

            <div class="contents_popular category_container">
                <div class="category_text">Popular Show</div>
                <div class="posters_container">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                    <img class="contents_poster" src="{{ asset('images/posters/AOT.png') }}">
                </div>
            </div>
        </div>
@endsection

