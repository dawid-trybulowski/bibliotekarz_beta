<?php

namespace App\Http\Controllers;

use App\books;
use App\Hydrator\ReservationsHydrator;
use App\Services\BooksServices\BooksRefactor;
use App\Services\BooksServices\CreateBooks;
use App\Services\BooksServices\CreateItems;
use App\UseCases\GetAllBooks;
use App\UseCases\GetAllBooksPresenter;
use Illuminate\Pagination\LengthAwarePaginator as Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Mockery\Exception;
use Monolog\Logger;

class BooksController extends Controller
{
    protected $books;

    protected $items;

    protected $createBooks;

    protected $booksRefactor;

    protected $createItems;

    protected $reservetionsHydrator;

    protected $reservations;

    protected $request;

    public function __construct(
        books $books,
        ItemsController $items,
        CreateBooks $createBooks,
        BooksRefactor $booksRefactor,
        CreateItems $createItems,
        ReservationsHydrator $reservationsHydrator,
        ReservationsController $reservationsController,
        Request $request
    )
    {
        $this->books = $books;
        $this->items = $items;
        $this->createBooks = $createBooks;
        $this->booksRefactor = $booksRefactor;
        $this->createItems = $createItems;
        $this->reservetionsHydrator = $reservationsHydrator;
        $this->reservationsController = $reservationsController;
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function index($message = '')
    {
        $books = $this->getBooks();

        $refactoredBooks = new Paginator($books['books'],$books['length'],20,null,['path' => Paginator::resolveCurrentPath()]);

        return view('index', compact('refactoredBooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public
    function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public
    function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($refactoredBooks)
    {
        return view('index', compact('refactoredBooks'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy($id)
    {
        //
    }

    public
    function reservation(Request $request)
    {
        $bookId = $request->bookId;
        $userId = $request->userId;

        $items = $this->items->getAvailableItems($bookId);

        $createdItems = $this->createItems->execute($items);
        $message = 'Rezerwacja niemożliwa';

        if (count($createdItems)) {
            try {
                $this->items->reservation($createdItems[0], $userId);
                $items = $this->items->getAvailableItems($bookId);
                $createdItems = $this->createItems->execute($items);
                $this->internalUpdate('items', count($createdItems), $bookId);
                $reservation = $this->reservetionsHydrator->execute($bookId, $userId, date('Y-m-d'), date('Y-m-d', strtotime("+30 days")), true);
                $this->reservationsController->add($reservation);
                $createdItems = $this->createItems->execute($items);
                if (count($createdItems) == 0) {
                    $this->setStatus($bookId, false);
                }
                $message = 'Rezerwacja powiodła się!';
            } catch (Exception $e) {
                $message = 'Rezerwacja niemożliwa';
                return Redirect::back()->with('message', $message);
            }
        }

        return Redirect::back()->with('message', $message);
    }

    public
    function setStatus($id, $status)
    {
        $this->books
            ->where('id', (int)$id)
            ->update(['status' => (boolean)$status]);
    }

    public function getBooks()
    {
        $page = 1;

        if(isset($_GET['page'])){
            $page = (int)$_GET['page'];
        }

        $allBooks = $this->books->paginate(20,null,null, $page);

        $length = count($this->books->all());

        $createdBooks = $this->createBooks->execute($allBooks);

        return
            [
            'books' => $this->booksRefactor->refactor($createdBooks),
            'length' => $length
            ];
    }

    public
    function internalUpdate($left, $right, $id)
    {
        $this->books
            ->where('id', (int)$id)
            ->update([$left => $right]);
    }

    public function getBooksByAuthor($author)
    {
        $page = 1;

        if(isset($_GET['page'])){
            $page = (int)$_GET['page'];
        }

        $query = "SELECT * FROM `books` WHERE author LIKE '%" . $author ."%'";

        $search = DB::select(DB::raw($query));

        $length = count($search);

        $createdBooks = $this->createBooks->execute($search);

        $slicedArray = array_slice($this->booksRefactor->refactor($createdBooks),($page - 1) * 20, 20);

        $refactoredBooks = new Paginator($slicedArray,$length,20,null,['path' => Paginator::resolveCurrentPath()]);

        return view('index', compact('refactoredBooks'));
    }

    public function getBooksByGenre($genre)
    {
        $page = 1;

        if(isset($_GET['page'])){
            $page = (int)$_GET['page'];
        }

        $query = "SELECT *
FROM books
LEFT JOIN books_have_genres ON books.id=books_have_genres.book_id
WHERE books_have_genres.genre_id=" . $genre . ";";

        $search = DB::select(DB::raw($query));

        $length = count($search);

        $createdBooks = $this->createBooks->execute($search);

        $slicedArray = array_slice($this->booksRefactor->refactor($createdBooks),($page - 1) * 20, 20);

        $refactoredBooks = new Paginator($slicedArray,$length,20,null,['path' => Paginator::resolveCurrentPath()]);

        return view('index', compact('refactoredBooks'));
    }

    public function search() {

        $page = 1;

        if(isset($_GET['page'])){
            $page = (int)$_GET['page'];
        }

        if(isset($_GET['search'])){
            $query = "SELECT * FROM `books` WHERE author LIKE '%" . $_GET['search'] . "%' OR title LIKE '%" . $_GET['search'] . "%' OR description LIKE '%" . $_GET['search'] . "%'" ;

            $search = DB::select(DB::raw($query));

            $length = count($search);

            $createdBooks = $this->createBooks->execute($search);

            $slicedArray = array_slice($this->booksRefactor->refactor($createdBooks),($page - 1) * 20, 20);

            $refactoredBooks = new Paginator($slicedArray,$length,20,null,['path' => Paginator::resolveCurrentPath()]);

            return view('index', compact('refactoredBooks'));
        }
    }
}
