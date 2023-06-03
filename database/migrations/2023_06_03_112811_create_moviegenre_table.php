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
        Schema::create('moviegenre', function (Blueprint $table) {
            $table->unsignedInteger('movie_id')->index('movie_id');
            $table->unsignedInteger('genre_id')->index('genre_id');

            $table->primary(['movie_id', 'genre_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moviegenre');
    }
};
