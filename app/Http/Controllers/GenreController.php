<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movies;
use App\Models\MovieGenre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function showAll(){
        return view('admin.genres', [
            "title" => "Genre",
            "genres" => Genre::all()
        ]);
    }

    public function show($slug){
        return view('admin.genre', [
            "title" => "Genre",
            "genre" => Genre::where('slug', $slug)->firstOrFail(),
            "movies" => Genre::where('slug', $slug)->firstOrFail()->movies
        ]);
    }

    public function addMovie($slug){
        return view('admin.addGenreMovie', [
            "title" => "Genre",
            "genre" => Genre::where('slug', $slug)->firstOrFail(),
            "movies" => Movies::all()->diff(Genre::where('slug', $slug)->firstOrFail()->movies)
        ]);
    }

    public function storeMovie(Request $request, $slug){
        $inputGenre = [
            "movie_id" => $request->selected,
            "genre_id" => Genre::where('slug', $slug)->firstOrFail()->id,
        ];
        MovieGenre::create($inputGenre);
        return redirect('/admin/genre/'.$slug);
    }

    public function addGenre(){
        return view('admin.addGenre', [
            "title" => "Genre",
        ]);
    }

    public function storeGenre(Request $request){

        $validated = $request->validate([
            "name" => "max:255|unique:genre"
        ]);
        $input = [
            "name" => ucwords($request->name),
            "slug" => Str::slug($request->name)
        ];
        Genre::create($input);
        return redirect("/admin/genre");
    }

    public function deleteGenre(Request $request, $slug){
        $genre_id = Genre::where('slug', $slug)->firstOrFail()->id;
        MovieGenre::where('genre_id', $genre_id)->delete();
        Genre::find($genre_id)->delete();
        return redirect("/admin/genre");
    }


}
