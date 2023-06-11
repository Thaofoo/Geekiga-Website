@extends('layouts.admintemplate')
@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/addMovie.css') }}">
<title> Geekiga Admin - Add Movie</title>
@endsection

@section('content')

<h1>Add Movie</h1>
<hr>

<form id="fileUploadForm" class="movie-form" action="/admin/movies/add" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="title">Title
    <input type="text" name="title" id="title" value="{{ old('title') }}"></label>
    @error('title')
    <div class="error_msg">{{ $message }}</div>
    @enderror

    <label for="year">Year
    <input type="text" name="year" id="year" value="{{ old('year') }}"></label>
    @error('year')
    <div class="error_msg">{{ $message }}</div>
    @enderror

    <label for="duration">Duration
    <input type="text" name="duration" id="duration" value="{{ old('duration') }}"></label>
    @error('duration')
    <div class="error_msg">{{ $message }}</div>
    @enderror

    <label for="desc">Description
    <textarea type="text" name="desc" id="desc">{{ old('desc') }}</textarea></label>
    @error('desc')
    <div class="error_msg">{{ $message }}</div>
    @enderror


    Genre
       <ul class="genre-container">
            @foreach ($genres as $genre)

            <li><div class="checkbox-container"><input type="checkbox" name="genre[]" value="{{ $genre->id }}"/> <p>{{ $genre->name }}</p> <br/></div></li>

            @endforeach
       </ul>

    <label  for="video">Video (Not Mandatory)
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
    <button class="button" type="submit">Add Movie</button>
    <div class="progress hidden">
        <div class="progress-bar progress-bar-striped" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">

        </div>
    </div>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js"></script>
<script>
    function showbar(){
        $('.progress').removeClass('hidden')
    }

    function hidebar(){
        $('.progress').addClass('hidden')
    }
    $(document).ready(function () {

        var displayPercent = $('.percent-bar').html

        $('#fileUploadForm').ajaxForm({
            beforeSend: function () {
                var percentage = '0';
                displayPercent = 'Progress = ' + percentage + '%'

            },
            uploadProgress: function (event, position, total, percentComplete) {
                showbar()
                var percentage = percentComplete;
                $('.progress-bar').css("width", percentage+'%', function() {
                  return $(this).attr("aria-valuenow", percentage) + "%";
                })
                $('.progress-bar').html('Progress = ' + percentage + '%');
            },
            error: function (err){
                if (err.status == 422) {
                    $('.error_msg').remove() 
                    hidebar();
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[for="'+i+'"]');
                        el.after($('<div class="error_msg">'+error[0]+'</div>'));
                    })

                }
            },
            success: function () {
                alert('Movie has been updated');
                hidebar();
                window.location.replace('{{ url('/admin/movies') }}');
            }
        });
    });

</script>

@endsection
