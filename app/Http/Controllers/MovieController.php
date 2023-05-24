<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use App\Models\Movies;
use App\Models\WatchLIst;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{

    // Return satu movie berdasarkan slug
    public function show($slug){

        $movieId = Movies::where('slug', $slug)->firstOrFail()->id;
        $userId = Auth::id();
        $watchlist = Watchlist::where('user_id', $userId)->where('movie_id', $movieId);
        if ($watchlist->first() !== null) {
            $logo = "watchlist_added";
        } else {
            $logo = "watchlist_add";

        }

        return view('movie', [
            'name' => 'movies',
            "title" => "Movie",
            "movie" => Movies::where('slug', $slug)->firstOrFail(),
            "genres" => Movies::where('slug', $slug)->firstOrFail()->genres,
            "logo" => $logo,
            "user" => Auth::user()
        ]);
    }

    public function showAll(){
        return view('popular', [
            "title" => 'Popular',
            "movies" => Movies::all(),
            "user" => Auth::user()
        ]
        );
    }

    public function searchMovie(Request $request)   {
        $movies = Movies::all();
        if($request->keyword != ''){
            $movies = Movies::where('title','LIKE','%'.$request->keyword.'%')->get();
            }

           return (view ('search', [
                "movies" => $movies,
                "name" => $request->keyword,
                "title" => "Search",
                "user" => Auth::user()
            ]));
        }

    public function showMovieByGenre(string $name) {
        return (view('genre', [
            "name" => $name,
            "title" => ucfirst($name) . " Genre",
            "movies" => Genre::where('name', $name)->firstOrFail()->movies,
            "user" => Auth::user()
        ]));
    }

    public function watchlist($slug) {

        $movieId = Movies::where('slug', $slug)->firstOrFail()->id;
        $userId = Auth::id();
        $data = [
            "user_id" => $userId,
            "movie_id" => $movieId
        ];
        $watchlist = Watchlist::where('user_id', $userId)->where('movie_id', $movieId);
        if ($watchlist->first() !== null) {
            $watchlist->delete();
        } else {
            WatchLIst::create($data);
        }

        return redirect('/movies'.'/'.$slug);
    }

}
