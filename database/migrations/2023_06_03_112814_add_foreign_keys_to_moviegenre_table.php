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
        Schema::table('moviegenre', function (Blueprint $table) {
            $table->foreign(['movie_id'], 'moviegenre_ibfk_1')->references(['id'])->on('movies')->onDelete('CASCADE');
            $table->foreign(['genre_id'], 'moviegenre_ibfk_2')->references(['id'])->on('genre')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('moviegenre', function (Blueprint $table) {
            $table->dropForeign('moviegenre_ibfk_1');
            $table->dropForeign('moviegenre_ibfk_2');
        });
    }
};
