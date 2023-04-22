<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


class Movies extends Model
{
    use HasFactory;
    static $movies = [
        [
            "title" => "Chainsaw Man",
            "year" => "2020",
            "desc" => "Chainsaw Man follows the story of Denji, an impoverished young man who makes a contract that fuses his body with that of a dog-like devil named Pochita, granting him the ability to transform parts of his body into chainsaws.",
            "subdesc" => "2023 • 11 Episodes • 1 Season",
            "slug" => "chainsaw-man-2020",
            "bgimg" => "url",
            "titleimg" => "url"
        ],
        [
            "title" => "Shingeki No Kyojin",
            "year" => "2020",
            "desc" => "Set in a world where humanity is forced to live in cities surrounded by three enormous walls that protect them from gigantic man-eating humanoids referred to as Titans; the story follows Eren Yeager, who vows to exterminate the Titans after they bring about the destruction of his hometown",
            "subdesc" => "2023 • 11 Episodes • 1 Season",
            "slug" => "shingeki-no-kyojin-2020",
            "bgimg" => "url",
            "titleimg" => "url"
        ],
    ];

    public static function find($slug){
        $movies = collect(self::$movies);
        $select = [];
        foreach($movies as $movie){
            if($movie["slug"]===$slug){
                $select = $movie;
            }
        }
        return $select;
    }
}
