<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class Book extends Model
{
    public function genres()
    {
        return $this->belongsToMany(Genres::class, 'books_have_genres', 'book_id', 'genre_id')->withTimestamps();
    }

    public function makeReservationForBook(int $bookId, int $items)
    {
        $this
            ->where('id', $bookId)
            ->update(
                [
                    'items' => $items
                ]);
        if (!($items)) {
            $this->statusChange($bookId, 0);
        }
    }

    public function makeBorrowForBook(int $bookId, int $items)
    {
        $this
            ->where('id', $bookId)
            ->update(
                [
                    'items' => $items
                ]);
        if (!$items) {
            $this->statusChange($bookId, 0);
        }
    }

    public function cancelReservationForBook($bookId, $items)
    {
        $this
            ->where('id', $bookId)
            ->update(
                [
                    'items' => $items,
                    'status' => 1
                ]);
    }

    public function statusChange(int $bookId, int $status)
    {
        $this
            ->where('id', $bookId)
            ->update(
                [
                    'status' => $status
                ]);
    }

    public function getBookById(int $bookId)
    {
        return $this
            ->where('id', $bookId)
            ->get()
            ->first();
    }

    public function search($search, $category, $genre, $orderBy, $orderDirection)
    {
        $where = $this->prepareWhereQuery($search, (int)$category, (int)$genre);

        $books = $this
            ->select(
                'books.*',
                'genres.id as genres_id',
                'genres.name as genres_name',
                'categories.id as categories_id',
                'categories.name as categories_name',
                'age_categories.id as age_categories_id',
                'age_categories.name as age_categories_name',
                'age_categories.min_age as age_categories_min_age',
                'age_categories.max_age as age_categories_max_age',
                'locations.id as locations_id',
                'locations.name as locations_name',
                'locations.address as locations_address'
            )
            ->where($where[0]['searchBy'], $where[0]['mark'], $where[0]['text'])
            ->where($where[1]['searchBy'], $where[1]['mark'], $where[1]['text'])
            ->where($where[2]['searchBy'], $where[2]['mark'], $where[2]['text'])
            ->where($where[3]['searchBy'], $where[3]['mark'], $where[3]['text'])
            ->where($where[4]['searchBy'], $where[4]['mark'], $where[4]['text'])
            ->where($where[5]['searchBy'], $where[5]['mark'], $where[5]['text'])
            ->where('books.active', 1)
            ->where('books.visible', 1)
            ->leftJoin('books_have_genres', 'books.id', '=', 'books_have_genres.book_id')
            ->leftJoin('genres', 'books_have_genres.genre_id', '=', 'genres.id')
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->leftJoin('age_categories', 'books.age_category_id', '=', 'age_categories.id')
            ->leftJoin('locations', 'books.location_id', '=', 'locations.id')
            ->orderBy('books.' . $orderBy, $orderDirection);

        return $books;
    }

    public function adminSearch($search, $orderBy, $orderDirection)
    {
        $where = $this->prepareWhereQuery($search, null, null);

        $books = $this
            ->select(
                'books.*',
                'genres.id as genres_id',
                'genres.name as genres_name',
                'categories.id as categories_id',
                'categories.name as categories_name',
                'age_categories.id as age_categories_id',
                'age_categories.name as age_categories_name',
                'age_categories.min_age as age_categories_min_age',
                'age_categories.max_age as age_categories_max_age',
                'locations.id as locations_id',
                'locations.name as locations_name',
                'locations.address as locations_address'
            )
            ->where('books.visible', 1)
            ->leftJoin('books_have_genres', 'books.id', '=', 'books_have_genres.book_id')
            ->leftJoin('genres', 'books_have_genres.genre_id', '=', 'genres.id')
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->leftJoin('age_categories', 'books.age_category_id', '=', 'age_categories.id')
            ->leftJoin('locations', 'books.location_id', '=', 'locations.id')
            ->where($where[0]['searchBy'], $where[0]['mark'], $where[0]['text'])
            ->orderBy($orderBy ?: 'books.id', $orderDirection);

        return $books;
    }

    private function prepareWhereQuery($search, $category, $genre)
    {
        $where = $search;
        if (!empty($category)) {
            array_push($where, ['searchBy' => 'books.category_id', 'mark' => '=', 'text' => $category]);
        } else {
            array_push($where, ['searchBy' => 'books.active', 'mark' => '>=', 'text' => 0]);
        }
        if (!empty($genre)) {
            array_push($where, ['searchBy' => 'books_have_genres.genre_id', 'mark' => '=', 'text' => $genre]);
        } else {
            array_push($where, ['searchBy' => 'books.active', 'mark' => '>=', 'text' => 0]);
        }

        return $where;

    }

    private function prepareOrderBy($orderBy)
    {
        $array = explode('|', $orderBy);
        $orderByArray =
            [
                'direction' => $array[0],
                'column' => $array[1]
            ];
        return $orderByArray;
    }

    public function getAllBooks()
    {
        return $this
            ->select(
                'books.*',
                'categories.id as categories_id',
                'categories.name as categories_name',
                'age_categories.id as age_categories_id',
                'age_categories.name as age_categories_name',
                'age_categories.min_age as age_categories_min_age',
                'age_categories.max_age as age_categories_max_age',
                'locations.id as locations_id',
                'locations.name as locations_name',
                'locations.address as locations_address'
            )
            ->where('books.active', 1)
            ->where('books.visible', 1)
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->leftJoin('age_categories', 'books.age_category_id', '=', 'age_categories.id')
            ->leftJoin('locations', 'books.location_id', '=', 'locations.id')
            ->orderBy('books.id', 'DESC');
    }

    public function getAllBooksAdmin()
    {
        return $this
            ->select(
                'books.*',
                'categories.id as categories_id',
                'categories.name as categories_name',
                'age_categories.id as age_categories_id',
                'age_categories.name as age_categories_name',
                'age_categories.min_age as age_categories_min_age',
                'age_categories.max_age as age_categories_max_age',
                'locations.id as locations_id',
                'locations.name as locations_name',
                'locations.address as locations_address'
            )
            ->where('books.visible', 1)
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->leftJoin('age_categories', 'books.age_category_id', '=', 'age_categories.id')
            ->leftJoin('locations', 'books.location_id', '=', 'locations.id')
            ->orderBy('id', 'DESC');
    }

    public function getAllBooksWithAgeRestriction($age)
    {
        return $this
            ->select(
                'books.*',
                'genres.id as genres_id',
                'genres.name as genres_name',
                'categories.id as categories_id',
                'categories.name as categories_name',
                'age_categories.id as age_categories_id',
                'age_categories.name as age_categories_name',
                'age_categories.min_age as age_categories_min_age',
                'age_categories.max_age as age_categories_max_age'
            )
            ->where
            (
                [
                    ['age_categories.max_age', '<', (int)$age],
                    ['books.active', '=', 1],
                    ['books.visible', '=', 1]
                ]
            )
            ->leftJoin('books_have_genres', 'books.id', '=', 'books_have_genres.book_id')
            ->leftJoin('genres', 'books_have_genres.genre_id', '=', 'genres.id')
            ->leftJoin('categories', 'books.category_id', '=', 'categories.id')
            ->leftJoin('age_categories', 'books.age_category_id', '=', 'age_categories.id')
            ->leftJoin('locations', 'books.location_id', '=', 'locations.id')
            ->orderBy('id', 'DESC');
    }

    public function cancelBorrowForBook($bookId, $items)
    {
        $this
            ->where('id', $bookId)
            ->update(
                [
                    'items' => $items,
                    'status' => 1
                ]);
    }

    public function getIdTitleAuthor()
    {
        return $this
            ->select('id', 'title', 'author', 'isbn')
            ->get();
    }

    public function addItem($bookId)
    {
        $result = $this
            ->where('id', (int)$bookId)
            ->increment('items');
        if ($result) {
            $result2 = $this
                ->where('id', (int)$bookId)
                ->update(['status' => 1]);
            return $result;
        } else {
            return false;
        }
    }

    public function updateRate($bookId, $calculatedRate, $rateSum, $rateCount)
    {
        return $this
            ->where('id', (int)$bookId)
            ->update
            (
                [
                    'rate' => $calculatedRate,
                    'rate_count' => $rateCount,
                    'rate_sum' => $rateSum
                ]
            );
    }
}
