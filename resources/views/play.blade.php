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
    <div class="plyr__video-embed" id="player">
        <iframe
          src="https://www.youtube.com/embed/bTqVqk7FSmY?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
          allowfullscreen
          allowtransparency
          allow="autoplay"
        ></iframe>
      </div>

</div>
</div>
@endsection
