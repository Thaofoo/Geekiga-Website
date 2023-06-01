@extends('layouts.loggedtemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/play.css') }}">
<title> Geekiga - {{ $movie->title }} </title>
@endsection

@section('content')
<div class="main-container">
<h3>{{ $movie->title }} ({{ $movie->year }})</h3>

<div class="player-container">
    <iframe width="100%" height="100%" class="player" src="{{ $movie->videolink }}" allowfullscreen></iframe>

</div>
</div>
@endsection
