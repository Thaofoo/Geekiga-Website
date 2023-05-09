<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('movie_genres', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('movie_id')->unsigned();

            $table->integer('genre_id')->unsigned();
        });

        Schema::table('movie_genres', function($table) {
            $table->foreign('movie_id')->references('id')->on('Movies');

            $table->foreign('genre_id')->references('id')->on('genre');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movie_genres');
    }
};
