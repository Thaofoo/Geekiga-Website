@extends('layouts.admintemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/Addmovie.css') }}">
<title> Geekiga Admin - Add Popular Movie</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/js/standalone/selectize.min.js" integrity="sha256-+C0A5Ilqmu4QcSPxrlGpaZxJ04VjsRjKu+G82kl5UJk=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
      $('select').selectize({
          sortField: 'text'
      });
  });
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />
@endsection

@section('content')

<h1>Add Popular Movie</h1>
<hr>

<form class="movie-form" method="post" action="/admin/popular/delete">
@csrf

<label for="selected" id="select-label">Movie</label>
<select id="select-state" placeholder="Pick a movie  " name="selected">
    <option value="">Select a movie...</option>
    @foreach ($movies as $movie)
    <option value="{{ $movie->id }}">{{ $movie->title }}</option>
    @endforeach
  </select>

<button class="button" type="submit">Remove Movie</button>
</form>

@endsection
