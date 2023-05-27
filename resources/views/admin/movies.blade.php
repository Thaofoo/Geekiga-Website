@extends('layouts.admintemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/movies.css') }}">
<title> Geekiga Admin - {{ $title }} </title>
@endsection

@section('content')

<div class="posters_container">
    @foreach ($movies as $movie)

    <a href="{{ URL::to("/admin/movies/".$movie->slug) }}" class="poster_clip" style="background-image: url('{{ asset('images/posters/'.$movie->slug.'.jpg') }}')"></a>

    @endforeach
</div>

@endsection
