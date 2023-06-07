@extends('layouts.admintemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/addMovie.css') }}">
<title> Geekiga Admin - Upload</title>
@endsection

@section('content')

<h1>Add Movie</h1>
<hr>

<form class="movie-form" action="/uploadvideo" method="POST" enctype="multipart/form-data">
    @csrf
    <label  for="file">Poster
    <input class="file-input" type="file" name="file" id="file">
    </label>
    @error('file')
    <div class="error_msg">{{ $message }}</div>
    @enderror

    <button class="button" type="submit">Update Movie</button>
</form>
@endsection
