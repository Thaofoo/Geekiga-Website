<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Movies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    public function index(){
        $users = User::all();
        $activeUser = 0;
        foreach ($users as $user){
            if(Cache::has('is_online' . $user->id)){
                $activeUser++;
            };
        }

        return view('admin.home', [
            "title" => 'Home',
            "userCount" => User::count(),
            "onlineCount" => $activeUser,
            'movieCount' => Movies::count(),
        ]);
    }
}
