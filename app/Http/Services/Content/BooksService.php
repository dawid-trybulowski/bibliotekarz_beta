<?php

namespace App\Http\Services\Content;

use App\Http\Entities\ReservationEntity;
use App\Http\Helpers\Message;
use App\Http\Services\Shared\ConfigService;
use App\Models\AgeCategories;
use App\Models\Book;
use App\Models\BooksHaveGenres;
use App\Models\Categories;
use App\Models\Config;
use App\Models\Genres;
use App\Models\Items;
use DateTime;
use Illuminate\Support\Facades\Auth;

class BooksService
{
    /**
     * @var BooksHaveGenres
     */
    protected $booksHaveGenres;
    /**
     * @var Genres
     */
    protected $genres;
    /**
     * @var Categories
     */
    protected $categories;
    /**
     * @var AgeCategories
     */
    protected $ageCategories;
    /**
     * @var Book
     */
    protected $books;
    /**
     * @var Items
     */
    protected $items;
    /**
     * @var Config
     */
    private $configAll;
    /**
     * @var ConfigService
     */
    private $configService;

    public function __construct
    (
        BooksHaveGenres $booksHaveGenres,
        Genres $genres,
        Categories $categories,
        AgeCategories $ageCategories,
        Book $books,
        Items $items,
        Config $configAll,
        ConfigService $configService
    )
    {
        $this->booksHaveGenres = $booksHaveGenres;
        $this->genres = $genres;
        $this->categories = $categories;
        $this->ageCategories = $ageCategories;
        $this->books = $books;
        $this->items = $items;
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
    }

    public function prepareBooks($books)
    {
        if (count($books) > 1) {
            foreach ($books as $book) {
                $bookGenres = $this->books
                    ->select('genres.id', 'genres.name')
                    ->join('books_have_genres', 'books.id', '=', 'books_have_genres.book_id')
                    ->join('genres', 'books_have_genres.genre_id', '=', 'genres.id')
                    ->where('books.id', $book->id)
                    ->get();
                $genresArray = [];
                foreach ($bookGenres as $genre) {
                    array_push($genresArray, ['id' => $genre->id, 'string' => $genre->name]);
                }
                $book->genres = $genresArray;
            }
        } elseif (count($books) === 1) {
            if (isset($books->id)) {
                $book = $books;
            } else {
                $book = $books[0];
            }
            $bookGenres = $this->books
                ->select('genres.id', 'genres.name')
                ->join('books_have_genres', 'books.id', '=', 'books_have_genres.book_id')
                ->join('genres', 'books_have_genres.genre_id', '=', 'genres.id')
                ->where('books.id', $book->id)
                ->get();
            $genresArray = [];
            foreach ($bookGenres as $genre) {
                array_push($genresArray, ['id' => $genre->id, 'string' => $genre->name]);
            }
            $book->genres = $genresArray;

            $bookCategory = $this->categories
                ->where('id', $book->category_id)
                ->first();
            $book->category =
                [
                    'id' => $bookCategory->id,
                    'string' => $bookCategory->name
                ];
            $bookAgeCategory = $this->ageCategories
                ->where('id', $book->age_category_id)
                ->first();
            $book->age_category =
                [
                    'id' => $bookAgeCategory->id,
                    'string' => $bookAgeCategory->name,
                    'min_age' => $bookAgeCategory->min_age,
                    'max_age' => $bookAgeCategory->max_age,
                ];
        }
        return $books;
    }

    public function getBookGenres($bookId)
    {
        $bookGenres = $this->booksHaveGenres
            ->where('book_id', (int)$bookId)
            ->select('books_have_genres.*')
            ->get();
        return $bookGenres;
    }

    public function search($text, $searchBy, $category, $genre, $orderBy)
    {
        return $this->books->search($text, $searchBy, $category, $genre, $orderBy);
    }

    public function getAllBooks($request)
    {
        if ($request->action == 'search') {

            $search =
                [
                    ['searchBy' => $request->search_1_searchBy, 'mark' => 'LIKE', 'text' => '%' . $request->search_1_text . '%'],
                    ['searchBy' => $request->search_2_searchBy, 'mark' => 'LIKE', 'text' => '%' . $request->search_2_text . '%'],
                    ['searchBy' => $request->search_3_searchBy, 'mark' => 'LIKE', 'text' => '%' . $request->search_3_text . '%'],
                    ['searchBy' => 'books.active', 'mark' => '=', 'text' => 1]
                ];

            $category = $request->category;
            $genre = $request->genre;
            $orderBy = $request->orderBy;
            $orderByArray = explode('|', $orderBy);
            $orderBy = $orderByArray[1];
            $orderDirection = $orderBy[0] ? 'DESC' : 'ASC';

            return $this->books->search($search, $category, $genre, $orderBy, $orderDirection);
        }elseif ($request->action == 'adminSearch' && Auth::user()->permissions > 1){
            if($request->searchBy == 'ID'){
                $search =
                    [
                        ['searchBy' => $request->searchBy, 'mark' => '=', 'text' => '%' . $request->text . '%'],
                    ];
            }else{
                $search =
                    [
                        ['searchBy' => $request->searchBy, 'mark' => 'LIKE', 'text' => '%' . $request->text . '%'],
                    ];
            }
            $orderBy = $request->orderBy;
            $orderDirection = $request->orderDirection;
            return $this->books->adminSearch($search, $orderBy, $orderDirection);
        }
        if((int)$this->config['show_books_only_for_adults'] && Auth::check())
        {
            $now = new DateTime(date("Y-m-d"));
            $birthDate = new DateTime(date(Auth::User()->birth_date));
            $age = $now->diff($birthDate)->y;
            $books = $this->books->getAllBooksWithAgeRestriction($age);
        }else{
            $books = $this->books->getAllBooks();
        }
        return $books;
    }

    public function getBooksDataForItem()
    {
        return $this->books->getIdTitleAuthor();
    }

    public function getBookById($bookId)
    {
        return $this->books->getBookById($bookId);
    }

    public function updateBookRate($bookId, $rate){
        $book = $this->getBookById((int)$bookId);
        $rateSum = $book->rate_sum;
        $rateCount = $book->rate_count;
        $calculatedRate = ($rateSum + $rate)/($rateCount + 1);

        return $this->books->updateRate($bookId, $calculatedRate, $rateSum + $rate, $rateCount + 1);
    }
}