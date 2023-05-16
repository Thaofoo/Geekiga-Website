<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movies;
use Illuminate\Http\Request;

class MovieController extends Controller
{

    // Return satu movie berdasarkan slug
    public function show($slug){
        return view('movie', [
            'name' => 'movies',
            "title" => "Movie",
            "movie" => Movies::where('slug', $slug)->firstOrFail()
        ]);
    }

    public function showAll(){
        return view('popular', [
            "title" => 'Popular',
            "movies" => Movies::all()
        ]
        );
    }

    public function showGenre($name){
        dd( view('movie', [
            'name' => 'movies',
            "title" => "Genre",
            "movie" => Genre::where('name', $name)->all()
        ]));
    }
}
