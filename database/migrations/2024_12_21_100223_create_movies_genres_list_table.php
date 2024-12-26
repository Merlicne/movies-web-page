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
        Schema::create('movies_genres_list', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('movie_id')->constrained('movies', 'movie_id');
            $table->foreignId('genre_id')->constrained('genres', 'genre_id');
            $table->unique(['movie_id', 'genre_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies_genres_list');
    }
};
