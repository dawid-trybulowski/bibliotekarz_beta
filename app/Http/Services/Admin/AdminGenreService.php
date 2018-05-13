<?php

namespace App\Http\Services\Admin;

use App\Http\Entities\GenreEntity;
use App\Http\Helpers\Message;
use App\Http\Services\Content\GenresService;
use App\Models\BooksHaveGenres;
use App\Models\Genres;

class AdminGenreService extends GenresService
{

    /**
     * @var BooksHaveGenres
     */
    private $booksHaveGenres;

    public function __construct(Genres $genres, BooksHaveGenres $booksHaveGenres)
    {
        parent::__construct($genres);
        $this->booksHaveGenres = $booksHaveGenres;
    }

    public function getAllGenres($request)
    {
        if ($request->searchBy) {
            return $this->genres->searchByAndSortBy($request);
        }
        return $this->genres->getAllGenres();
    }

    public function getGenreById($genreId)
    {
        return $this->genres->getGenreById($genreId);
    }

    public function editGenre($request)
    {
        $genreEntity = $this->createGenreEntity((int)$request->id, $request->name);
        $result = $this->genres->editGenre($genreEntity);
        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    public function createGenreEntity($id = null, $name)
    {
        $genreEntity = new GenreEntity();
        $genreEntity->setName($name);
        $genreEntity->setId($id);
        return $genreEntity;
    }

    public function addGenre($request)
    {
        $genreEntity = $this->createGenreEntity(null, $request->name);
        $result = $this->genres->addGenre($genreEntity);
        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem') . '. Id nowego gatunku: ' . $result, 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    public function deleteGenre($genreId)
    {
        $dependencies = $this->checkGenreDependencies($genreId);
        foreach ($dependencies as $dependency) {
            if ($dependency['dependencies']) {
                $message = new Message(__('view.Błąd'), 'Nie możesz usunąć gatunku przypisanego do ' . $dependency['string'], 409, false);
                return $message;
            }
        }
        $result = $this->genres->deleteGenre($genreId);
        if ($result) {
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    private function checkGenreDependencies($genreId)
    {
        $dependencies = [];
        $books = $this->booksHaveGenres
            ->where
            (
                'genre_id', (int)$genreId
            )
            ->get();
        if (count($books)) {
            $dependencies['books'] =
                [
                    'string' => 'książki',
                    'ids' => [],
                    'dependencies' => true
                ];
            foreach ($books as $book) {
                array_push($dependencies['books']['ids'], $book->book_id);
            }
        } else {
            $dependencies['books'] =
                [
                    'string' => 'Książki',
                    'ids' => [],
                    'dependencies' => false
                ];
        }

        return $dependencies;
    }
}