<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WatchLIst extends Model
{
    use HasFactory;
    public $table = "watchlist";
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'movie_id',
    ];

}
