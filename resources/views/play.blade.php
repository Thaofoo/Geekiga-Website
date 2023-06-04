@extends('layouts.loggedtemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/play.css') }}">
<title> Geekiga - {{ $movie->title }} </title>
<script src="https://cdn.plyr.io/3.7.8/plyr.js"></script>
<link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />
@endsection

@section('content')
<div class="main-container">
<h3>{{ $movie->title }} ({{ $movie->year }})</h3>

<div class="player-container">
    <video id="player" playsinline controls autoplay>
        <source src="{{ $movie->videolink }}" type="video/mp4">
    </video>

</div>
</div>
@endsection
