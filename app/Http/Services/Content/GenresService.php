<?php

namespace App\Http\Services\Content;

use App\Models\Genres;

class GenresService
{
    /**
     * @var Genres
     */
    protected $genres;

    public function __construct
    (
        Genres $genres
    )
    {

        $this->genres = $genres;
    }
}