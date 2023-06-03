@extends('layouts.admintemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/addMovie.css') }}">
<title> Geekiga Admin - Add Genre</title>
@endsection

@section('content')

<h1>Add Genre</h1>
<hr>

<form class="movie-form" action="/admin/genre/add" method="POST">
@csrf
    <label for="name">Genre Name</label>
        <input type="text" name="name" id="name">
        @error('name')
        <div class="error_msg">{{ $message }}</div>
        @enderror
        <button class="button" type="submit">Add Genre</button>
</form>

@endsection
