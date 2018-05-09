<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Content\BookController;
use App\Http\Services\Admin\AdminAgeCategoryService;
use App\Http\Services\Admin\AdminBooksService;
use App\Http\Services\Admin\AdminCategoryService;
use App\Http\Services\Admin\AdminGenreService;
use App\Http\Services\Content\BooksService;
use App\Http\Services\Content\CategoriesService;
use App\Http\Services\Content\CommentsAndRatesService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Book;
use App\Models\Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminBookController extends BookController
{
    /**
     * @var AdminBooksService
     */
    private $adminBooksService;
    /**
     * @var AdminCategoryService
     */
    private $adminCategoryService;
    /**
     * @var AdminAgeCategoryService
     */
    private $adminAgeCategoriesService;
    /**
     * @var AdminGenreService
     */
    private $adminGenresService;

    public function __construct(Book $books, BooksService $booksService, Config $configAll, ConfigService $configService, CommentsAndRatesService $commentsAndRatesService, AdminBooksService $adminBooksService, AdminCategoryService $adminCategoryService, AdminGenreService $adminGenresService, AdminAgeCategoryService $adminAgeCategoriesService)
    {
        parent::__construct($books, $booksService, $configAll, $configService, $commentsAndRatesService);
        $this->adminBooksService = $adminBooksService;
        $this->adminCategoryService = $adminCategoryService;
        $this->adminAgeCategoriesService = $adminAgeCategoriesService;
        $this->adminGenresService = $adminGenresService;
    }

    public function editBookShow(Request $request)
    {
        $bookId = (int)$request->bookId;

        $book = $this->adminBooksService->getBookById($bookId);
        $preparedBook = $this->adminBooksService->prepareBooks($book);
        $categories = $this->adminCategoryService->getAllCategories($request);
        $genres = $this->adminGenresService->getAllGenres($request);
        $ageCategories = $this->adminAgeCategoriesService->getAllAgeCategories($request);

        $compact =
            [
                'book' => $preparedBook,
                'categories' => $categories,
                'genres' => $genres,
                'ageCategories' => $ageCategories,
                'config' => $this->config
            ];

        return view('admin/admin-book-edit', compact('compact'));

    }

    public function editBook(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'unifiedTitle' => 'string|nullable',
            'author' => 'required|string|max:255',
            'subauthors' => 'string|nullable',
            'publishingHouse' => 'string|max:255',
            'isbn' => 'string|nullable|unique:books,isbn,' . (int)$request->id,
            'language' => 'required|string|max:2',
            'publicationCountryCode' => 'string|max:2|nullable',
            'pages' => 'integer|nullable',
            'edition' => 'integer|nullable',
            'publicationYear' => 'integer|nullable',
            'description' => 'required|string',
            'category' => 'required|integer',
            'genres' => 'required',
            'ageCategory' => 'required|integer',
            'owner' => 'required|string',
            'locationCode' => 'string|nullable',
            'visible' => 'required|string'
        ]);
        $photo = null;
        if ($_FILES["photo"]) {
            $photo = $_FILES["photo"];
        }
        $message = $this->adminBooksService->editBook($request, $photo);

        return Redirect::back()->with('message', $message);
    }

    public function addBookShow(Request $request)
    {
        $categories = $this->adminCategoryService->getAllCategories($request);
        $genres = $this->adminGenresService->getAllGenres($request);
        $ageCategories = $this->adminAgeCategoriesService->getAllAgeCategories($request);

        $compact =
            [
                'categories' => $categories,
                'genres' => $genres,
                'ageCategories' => $ageCategories,
                'config' => $this->config
            ];

        return view('admin/admin-book-add', compact('compact'));
    }

    public function addBook(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'unifiedTitle' => 'string|nullable',
            'author' => 'required|string|max:255',
            'subauthors' => 'string|nullable',
            'publishingHouse' => 'string|max:255',
            'isbn' => 'string|nullable|unique:books,isbn,' . (int)$request->id,
            'language' => 'required|string|max:2',
            'publicationCountryCode' => 'string|max:2|nullable',
            'pages' => 'integer|nullable',
            'edition' => 'integer|nullable',
            'publicationYear' => 'integer|nullable',
            'description' => 'required|string',
            'category' => 'required|integer',
            'genres' => 'required',
            'ageCategory' => 'required|integer',
            'owner' => 'required|string',
            'locationCode' => 'string|nullable',
            'visible' => 'required|string',
            'keys' => 'string|nullable'
        ]);

        $photo = null;
        if ($_FILES["photo"]) {
            $photo = $_FILES["photo"];
        }

        $message = $this->adminBooksService->addBook($request, $photo);

        return Redirect::back()->with('message', $message);
    }

    public function searchByAndSortBy(Request $request)
    {
        $request->validate([
            'searchBy' => 'required|string|max:255',
            'text' => 'required|string|max:255',
            'orderBy' => 'required|string|max:255',
            'orderDirection' => 'required|string|max:4',
        ]);
        $searchBy = $request->searchBy;
        $text = $request->text;
        $orderBy = $request->orderBy;
        $orderDestination = 'DESC';

        if($searchBy !== 'id'){
            $books = $this->books
                ->where($searchBy, 'LIKE', '%' . $text . '%')
                ->orderBy($orderBy, $orderDestination);
        }
        else{
            $books = $this->books
                ->where($searchBy, (int)$text)
                ->orderBy($orderBy, $orderDestination);
        }
        $preparedBooks = $this->booksService->prepareBooks($books->paginate());

                $compact =
                    [
                        'books' => $preparedBooks,
                        'config' => $this->config
                    ];

        return view('admin/books', compact('compact'));
    }
}