<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'overview',
        'original_language',
        'original_title',
        'poster_path',
        'backdrop_path',
        'adult',
        'video',
        'popularity',
        'vote_average',
        'vote_count',
        'release_date',
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
