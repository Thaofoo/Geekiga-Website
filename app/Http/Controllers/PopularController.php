<?php

namespace App\Http\Controllers;

use App\Models\Movies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PopularController extends Controller
{
    public function add() {
            return view('admin.addPopularMovie', [
                "title" => "Genre",
                "movies" => Movies::where('popular', 0)->get()
            ]);
    }

    public function remove() {
        return view('admin.deletePopularMovie', [
            "title" => "Genre",
            "movies" => Movies::where('popular', 1)->get()
        ]);
    }

    public function update(Request $request){
        $movie = Movies::find($request->selected);
        if ($movie->popular == 0){
            $movie->popular = 1;
        }
        else {
            $movie->popular = 0;
        }
        $movie->save();
        return redirect('/admin/popular');
    }

}
