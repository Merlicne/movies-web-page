<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index']);

Route::get('/search', [MovieController::class, 'searchMovies'])->name('search');

Route::get('/movies', [MovieController::class, 'movies'])->name('movies');

Route::get('/tv-series', [MovieController::class, 'tvSeries'])->name('tv-series');

Route::get('/movies/{movie_id}', [MovieController::class, 'movieDetail'])->name('movie-detail');