<?php

namespace App\Models;

use App\Models\MovieGenre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Genre extends Model
{
    use HasFactory;

    public $table = "genre";
    protected $guarded = ['id'];

    public function movies(): BelongsToMany

    {

        return $this->belongsToMany(Movies::class, 'movieGenre', 'genre_id', 'movie_id');

    }
}
