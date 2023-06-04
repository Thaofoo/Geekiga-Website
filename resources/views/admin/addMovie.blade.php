@extends('layouts.admintemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/addMovie.css') }}">
<title> Geekiga Admin - Add Movie</title>
@endsection

@section('content')

<h1>Add Movie</h1>
<hr>

<form class="movie-form" action="/admin/movies/add" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Title</label>
    <input type="text" name="title" id="title">
    @error('title')
    <div class="error_msg">{{ $message }}</div>
    @enderror

    <label for="year">Year</label>
    <input type="text" name="year" id="year">
    @error('year')
    <div class="error_msg">{{ $message }}</div>
    @enderror

    <label for="duration">Duration</label>
    <input type="text" name="duration" id="duration">
    @error('duration')
    <div class="error_msg">{{ $message }}</div>
    @enderror

    <label for="desc">Description</label>
    <textarea type="text" name="desc" id="desc"></textarea>
    @error('desc')
    <div class="error_msg">{{ $message }}</div>
    @enderror

    <label for="videolink">Video Link (Not Required)</label>
    <input type="text" name="videolink" id="videolink">
    @error('videolink')
    <div class="error_msg">{{ $message }}</div>
    @enderror

    Genre
       <ul class="genre-container">
            @foreach ($genres as $genre)

            <li><div class="checkbox-container"><input type="checkbox" name="genre[]" value="{{ $genre->id }}"/> <p>{{ $genre->name }}</p> <br/></div></li>

            @endforeach
       </ul>




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

    <button class="button" type="submit">Add Movie</button>
</form>

@endsection
