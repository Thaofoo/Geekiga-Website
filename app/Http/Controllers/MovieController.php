<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Genre;
use App\Models\Movies;
use App\Models\WatchLIst;
use App\Models\MovieGenre;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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
            "title" => "Movies",
            "movie" => Movies::where('slug', $slug)->firstOrFail(),
            "genres" => Movies::where('slug', $slug)->firstOrFail()->genres,
            "logo" => $logo,
            "user" => Auth::user()
        ]);
    }

    public function showAdmin($slug){
        return (view('admin.movie', [
            'name' => 'movies',
            "title" => "Movies",
            "movie" => Movies::where('slug', $slug)->firstOrFail(),
            "checkedGenres" => Movies::where('slug', $slug)->firstOrFail()->genres,
            "genres" => Genre::all(),
            "user" => Auth::user(),
        ]));
    }

    public function showAll(){
        return view('movies', [
            "title" => 'Movies',
            "movies" => Movies::all(),
            "user" => Auth::user()
        ]
        );
    }

    public function showAllAdmin(){
        return view('admin.movies', [
            "title" => 'Movies',
            "movies" => Movies::all(),
            "user" => Auth::user()
        ]
        );
    }

    public function showPopular(){
        return view('movies', [
            "title" => 'Popular',
            "movies" => Movies::where('popular', 1),
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

    public function home() {
        return view('home', [
            "title" => "Home",
            "movie" => Movies::where('slug', "chainsaw-man-2020")->first(),
            "user" => Auth::user(),
            "genres" => Genre::all(),

        ]);

    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => "required|max:255",
            "year" => "required|max:255",
            "duration" => "required",
            "desc" => "required",
            "poster" => "required|mimes:jpeg,png,jpg",
            "header" => "required|mimes:jpeg,png,jpg",
            "titleImg" => "required|mimes:jpeg,png,jpg",
            "video" => "nullable|mimetypes:video/mp4",
        ]);

        $slug = Str::slug($request['title']) . "-" . $request['year'];

        $videoFileName = $slug . '.' . 'mp4';
        $request->video->storeAs('public/video', $videoFileName);

        $posterFileName = $slug . '.' . $request->poster->extension();
        $request->poster->storeAs('public/images/poster', $posterFileName);

        $headerFileName = $slug . '.' . $request->header->extension();
        $request->header->storeAs('public/images/header', $headerFileName);

        $titleFileName = $slug . '.' . $request->titleImg->extension();
        $request->titleImg->storeAs('public/images/title', $titleFileName);

        $genres = $request['genre'];

        $request = $request->except(['poster','header', 'titleImg', 'genre']);

        $request['posterimg'] = $posterFileName;
        $request['videolink'] = asset("storage/video/") . "/" . $videoFileName;;
        $request['headerimg'] = $headerFileName;
        $request['titleimg'] = $titleFileName;
        $request['slug'] = $slug;

        Movies::create($request);

        $movieID = Movies::where('slug', $slug)->firstOrFail()->id;

        if($genres != null)
        {foreach ($genres as $genre) {
            $input = [
                "movie_id" => $movieID,
                "genre_id" => $genre,
            ];
            MovieGenre::create($input);
        }}

        return response()->json(['success'=>'Successfully uploaded.']);
        //return redirect('/admin/movies');

    }

    public function movieAddPage() {
        return view('admin.addMovie', [
            "title" => "Movies",
            "genres" => Genre::all()
        ]);
    }

    public function delete($slug) {
        $movie = Movies::where('slug', $slug)->firstOrFail();
        $movieID = $movie->id;
        $poster = $movie->posterimg;
        $header = $movie->headerimg;
        $title = $movie->titleimg;
        $videolink = basename($movie->videolink);
        Storage::delete('public/images/poster'.$poster);
        Storage::delete('public/images/header'.$header);
        Storage::delete('public/images/title'.$title);
        Storage::delete('public/video'.$videolink);
        MovieGenre::where('movie_id', $movieID)->delete();
        WatchLIst::where('movie_id', $movieID)->delete();
        Movies::where('id', $movieID)->delete();

        return redirect('/admin/movies');
    }

    public function update(Request $request, $slug){

        $validated = $request->validate([
            'title' => "max:255",
            "year" => "max:255",
            "duration" => "max:255",
            "desc" => "",
            "poster" => "nullable|mimes:jpeg,png,jpg",
            "header" => "nullable|mimes:jpeg,png,jpg",
            "titleImg" => "nullable|mimes:jpeg,png,jpg",
            "video" => "nullable|mimetypes:video/mp4",
            "genre" => "nullable",
        ]);



        $movie = Movies::where('slug', $slug)->firstOrFail();
        $input = array_filter($request->except(['poster', 'header', 'titleImg', 'genre', 'video']));

        if ($request['video'] != null){
            $original = basename($movie->videolink);
            Storage::delete('public/video/'.$original);
            $fileName = $slug . '.' . "mp4";
            $request->video->storeAs('public/video', $fileName);
            $input['videolink'] = asset("storage/video/") . "/" . $fileName;
        }

        if ($request['poster'] != null){
            $original = $movie->posterimg;
            Storage::delete('public/images/poster/'.$original);
            $fileName = $slug . '.' . $request->poster->extension();
            $request->poster->storeAs('public/images/poster', $fileName);
            $input['posterimg'] = $fileName;
        }

        if ($request['header'] != null){
            $original = $movie->headerimg;
            Storage::delete('public/images/header/'.$original);
            $fileName = $slug . '.' . $request->header->extension();
            $request->header->storeAs('public/images/header', $fileName);
            $input['headerimg'] = $fileName;

        }

        if ($request['titleImg'] != null){
            $original = $movie->titleimg;
            Storage::delete('public/images/title/'.$original);
            $fileName = $slug . '.' . $request->titleImg->extension();
            $request->titleImg->storeAs('public/images/title', $fileName);
            $input['titleimg'] = $fileName;
        }

        if ($request['genre'] != null) {

            $movieID = $movie->id;
            MovieGenre::where('movie_id', $movieID)->delete();
            foreach ($request['genre'] as $genre) {
                $inputGenre = [
                    "movie_id" => $movieID,
                    "genre_id" => $genre,
                ];
                MovieGenre::create($inputGenre);
            }
        }


        $movie->update($input);

        if ($request['title'] != null or $request['year'] != null) {
            $slug = Str::slug($movie->title) . "-" . $movie->year;
            $movie -> update([
                "slug" => $slug
            ]);
            $slug = $movie -> slug;
            $originalPoster = $movie->posterimg;
            $posterExt = pathinfo(asset('storage/images/poster'.$originalPoster), PATHINFO_EXTENSION);
            $newPoster = $slug . "." . $posterExt;
            Storage::move('public/images/poster/'.$originalPoster, 'public/images/poster/'.$newPoster);
            $movie->update([
                "posterimg" => $newPoster
            ]);

            $originalHeader = $movie->headerimg;
            $headerExt = pathinfo(asset('storage/images/header'.$originalHeader), PATHINFO_EXTENSION);
            $newHeader = $slug . "." . $headerExt;
            Storage::move('public/images/header/'.$originalHeader, 'public/images/header/'.$newHeader);
            $movie->update([
                "headerimg" => $newHeader
            ]);

            $originalTitle = $movie->titleimg;
            $titleExt = pathinfo(asset('storage/images/title'.$originalTitle), PATHINFO_EXTENSION);
            $newTitle = $slug . "." . $titleExt;
            Storage::move('public/images/title/'.$originalTitle, 'public/images/title/'.$newTitle);
            $movie->update([
                "titleimg" => $newTitle
            ]);
        }

        session()->flash('success', 'Movie Updated');
        return response()->json(['success'=>'Successfully uploaded.']);

    }

    public function popularAdmin(){
        return view('admin.popular', [
            "title" => 'Popular',
            "movies" => Movies::where('popular', 1)->get(),
        ]
        );
    }

    public function play($slug){
        return view('play', [
            "title" => 'Movies',
            "movie" => Movies::where('slug', $slug)->firstOrFail(),
            "user" => Auth::user()
        ]);
    }
}

