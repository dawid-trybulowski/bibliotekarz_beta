<?php

namespace App\Http\Controllers\Content;

use App\Http\Entities\ReservationEntity;
use App\Http\Services\Content\BooksService;
use App\Http\Services\Content\CommentsAndRatesService;
use App\Http\Services\Shared\ConfigService;
use App\Mappers\BookMapper;
use App\Models\Book;
use App\Models\Config;
use Illuminate\Http\Request;

class BookController
{
    /**
     * @var BooksService
     */
    protected $booksService;
    /**
     * @var Config
     */
    protected $configAll;
    /**
     * @var ConfigService
     */
    protected $configService;

    protected $config;
    /**
     * @var CommentsAndRatesService
     */
    private $commentsAndRatesService;

    public function __construct(
        Book $books,
        BooksService $booksService,
        Config $configAll,
        ConfigService $configService,
        CommentsAndRatesService $commentsAndRatesService
    )
    {
        $this->books = $books;
        $this->booksService = $booksService;
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
        $this->commentsAndRatesService = $commentsAndRatesService;
    }

    public function showBookPage(Request $request)
    {
        $bookId = $request->bookId;
        $book = $this->booksService->getBookById($bookId);

        $preparedBook = $this->booksService->prepareBooks($book);
        $comments = $this->commentsAndRatesService->getComments();
        $mapper = new BookMapper();
        $map = $mapper->map;
        $compact =
            [
                'book' => $preparedBook,
                'comments' => $comments,
                'config' => $this->config,
                'map' => $map
            ];
        return view('book-page', compact('compact'));
    }

}