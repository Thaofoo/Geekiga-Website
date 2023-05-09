<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movie_genre', function (Blueprint $table) {
            $table->foreign(['movie_id'], 'movie_genre_ibfk_1')->references(['id'])->on('movies')->onDelete('CASCADE');
            $table->foreign(['genre_id'], 'movie_genre_ibfk_2')->references(['id'])->on('Genre')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('movie_genre', function (Blueprint $table) {
            $table->dropForeign('movie_genre_ibfk_1');
            $table->dropForeign('movie_genre_ibfk_2');
        });
    }
};
