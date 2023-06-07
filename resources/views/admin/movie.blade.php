@extends('layouts.admintemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/addMovie.css') }}">
<title> Geekiga Admin - Edit Movie</title>
@endsection

@section('content')

<h1>Add Movie</h1>
<hr>

<div class="button-container">
    <a href="{{ URL::to("/movies/" . $movie->slug) }}" class="button add-movie">
        <img src="{{ asset('interface_assets/Movie.svg') }}" height="16px"> <p>Client Version</p>
    </a>
</div>

<form class="movie-form" action="/admin/movies/{{ $movie->slug }}/edit" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Title</label>
    <input type="text" name="title" id="title" value="{{ $movie->title }}">
    @error('title')
    <div class="error_msg">{{ $message }}</div>
    @enderror

    <label for="year">Year</label>
    <input type="text" name="year" id="year" value="{{ $movie->year }}">
    @error('year')
    <div class="error_msg">{{ $message }}</div>
    @enderror

    <label for="duration">Duration</label>
    <input type="text" name="duration" id="duration" value="{{ $movie->duration }}">
    @error('duration')
    <div class="error_msg">{{ $message }}</div>
    @enderror

    <label for="desc">Description</label>
    <textarea type="text" name="desc" id="desc"> {{ $movie->desc }} </textarea>
    @error('desc')
    <div class="error_msg">{{ $message }}</div>
    @enderror

    Genre
       <ul class="genre-container">
            @foreach ($genres as $genre)

            <li><div class="checkbox-container"><input {{ ($checkedGenres->contains('id', $genre->id)) ? 'checked' : '' }} type="checkbox" name="genre[]" value="{{ $genre->id }}"/> <p>{{ $genre->name }}</p> <br/></div></li>

            @endforeach
       </ul>

    <label  for="video">Video
    <input class="file-input" type="file" name="video" id="video">
    </label>
    @error('video')
    <div class="error_msg">{{ $message }}</div>
    @enderror

    <label  for="titleImg">Title Image
        <input class="file-input" type="file" name="titleImg" id="titleImg">
        </label>
        @error('titleImg')
        <div class="error_msg">{{ $message }}</div>
        @enderror

    <label  for="poster">Poster
    <input class="file-input" type="file" name="poster" id="poster">
    </label>
    @error('poster')
    <div class="error_msg">{{ $message }}</div>
    @enderror

    <label  for="header">Header
    <input class="file-input" type="file" name="header" id="header">
    </label>
    @error('header')
    <div class="error_msg">{{ $message }}</div>
    @enderror

    <button class="button" type="submit">Update Movie</button>
</form>
<form action="/admin/movies/{{ $movie->slug }}/delete" method="POST">
    @csrf
    <button class="button delete-button" type="submit" onclick="return confirm('Are you sure?')">Delete Movie</button>
</form>
@endsection
