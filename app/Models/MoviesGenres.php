<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoviesGenres extends Model
{
    protected $table = 'movies_genres';
    
    
    protected $primaryKey = 'genre_id';
    public $incrementing = false;

    protected $fillable = [
        'name',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movies::class, 'movies_genres_list', 'genre_id', 'movie_id');
    }
}
