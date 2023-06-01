<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Movies extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        "year",
        "duration",
        "desc",
        "posterimg",
        "headerimg",
        "titleimg",
        "slug",
        "videolink"
    ];

    public function genres(): BelongsToMany

    {

        return $this->belongsToMany(Genre::class, 'movieGenre', 'movie_id', 'genre_id');

    }

    public function watchlist(): BelongsToMany

    {

        return $this->belongsToMany(User::class, 'watchList', 'movie_id', 'user_id');

    }

}
