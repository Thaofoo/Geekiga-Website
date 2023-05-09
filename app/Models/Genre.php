<?php

namespace App\Models;

use App\Models\MovieGenre;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genre extends Model
{
    use HasFactory;

    public function movies()

    {

        return $this->belongsToMany(MovieGenre::class, 'role_user');

    }
}
