<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Movies extends Model
{
    use HasFactory;

    public function genres(): BelongsToMany

    {

        return $this->belongsToMany(Genre::class, 'movieGenre', 'movie_id', 'genre_id');

    }

}
