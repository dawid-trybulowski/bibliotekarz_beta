<?php

namespace App\Services\BooksServices;

use App\books_have_genres;
use App\genres;
use App\Responses\Books;
const statuses =
[
    0 => 'Niedostępna',
    1 => 'Dostępna',
];

class BooksRefactor
{
    function refactor($books)
    {
        $result = [];
        foreach ($books as $key => $book) {

            $this->GenresRefactor($book);

            $this->StatusRefactor($book);

            $result[] = $book;
        }

        return $result;
    }

    function GenresRefactor (Books $book) {
        $booksHaveGenresDatabase = new books_have_genres();

        $genresDatabase = new genres();

        $genres = $booksHaveGenresDatabase
            ->get()
            ->where('book_id', '=', $book->getId());

        $genresRefactored = [];

        foreach ($genres as $key => $genre){

            $genresRefactored[] = [
                'genreId' => $genre->genre_id,
                'genreName' => $genresDatabase
                ->where('id', '=', $genre->genre_id)
                ->pluck('name')
                ];
        }

        $book->setGenres($genresRefactored);

    }

    function StatusRefactor (Books $book) {
        $book->setStatus(statuses[$book->getStatus()]);
    }
}
