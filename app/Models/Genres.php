<?php

namespace App\Models;

use App\Http\Entities\GenreEntity;
use Illuminate\Database\Eloquent\Model;

class Genres extends Model
{
    public function getAllGenres()
    {
        return $this
            ->where('active', true)
            ->paginate(20);
    }

    public function getGenreById($genreId)
    {
        return $this
            ->where('id', (int)$genreId)
            ->get()
            ->first();
    }

    public function editGenre(GenreEntity $genreEntity)
    {
        return $this
            ->where('id', $genreEntity->getId())
            ->update
            (
                [
                    'name' => $genreEntity->getName()
                ]
            );
    }

    public function addGenre(GenreEntity $genreEntity)
    {
        return $this
            ->insertGetId
            (
                [
                    'name' => $genreEntity->getName()
                ]
            );
    }
    public function searchByAndSortBy($request)
    {
        $searchBy = $request->searchBy;
        $text = $request->text;
        $orderBy = $request->orderBy;
        $orderDirection = $request->orderDirection;

        if ($searchBy !== 'id') {
            $genres = $this
                ->where($searchBy, 'LIKE', '%' . $text . '%')
                ->orderBy($orderBy, $orderDirection)
                ->paginate(20);
        } else {
            $genres = $this
                ->where($searchBy, (int)$text)
                ->orderBy($orderBy, $orderDirection)
                ->paginate(20);
        }

        return $genres;
    }

    public function deleteGenre($genreId)
    {
        return $this
            ->where('id', (int)$genreId)
            ->delete();
    }
}
