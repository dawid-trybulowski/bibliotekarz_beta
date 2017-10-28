<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    public function genres() {
        return $this->belongsToMany(genres::class, 'books_have_genres', 'book_id', 'genre_id')->withTimestamps();
    }
}
