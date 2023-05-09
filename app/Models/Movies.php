<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;


class Movies extends Model
{
    use HasFactory;

    public function genres()

    {

        return $this->belongsToMany(MovieGenre::class, 'role_user');

    }

}
