<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movies extends Model
{
    protected $table = 'movies';
    //

    protected $primaryKey = 'movie_id';
    public $incrementing = false;
    

    protected $fillable = [
        'title',
        'original_title',
        'original_language',
        'overview',
        'popularity',
        'director',
        'poster_path',
        'duration',
        'release_date',
        'vote_average',
        'vote_count',
    ];

    public function genres(): BelongsToMany
    {

        return $this->belongsToMany(MoviesGenres::class, 'movies_genres_list', 'movie_id', 'genre_id');
        
    }
}
