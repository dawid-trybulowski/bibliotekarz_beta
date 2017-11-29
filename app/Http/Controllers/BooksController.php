<?php

namespace App\Http\Controllers;

use App\books;
use App\items;
use App\Services\BooksServices\BooksRefactor;
use App\Services\BooksServices\CreateBooks;
use App\Services\BooksServices\CreateItems;
use App\UseCases\GetAllBooks;
use App\UseCases\GetAllBooksPresenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Redirect;

class BooksController extends Controller
{
    protected $books;

    protected $items;

    protected $createBooks;

    protected $booksRefactor;

    protected $createItems;

    public function __construct(
        books $books,
        ItemsController $items,
        CreateBooks $createBooks,
        BooksRefactor $booksRefactor,
        CreateItems $createItems
    )
    {
        $this->books = $books;
        $this->items = $items;
        $this->createBooks = $createBooks;
        $this->booksRefactor = $booksRefactor;
        $this->createItems = $createItems;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($message = ''){
        $refactoredBooks = $this->getBooks();

        return view('index', compact('refactoredBooks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function reservation(Request $request)
    {
        $bookId = $request->bookId;
        $userId = $request->userId;

        $items = $this->items->getAvailableItems($bookId);

        $createdItems = $this->createItems->execute($items);

        $message = 'Rezerwacja niemożliwa';

        if(count($createdItems)) {
            $this->items->reservation($createdItems[0], $userId);
            $items = $this->items->getAvailableItems($bookId);
            $createdItems = $this->createItems->execute($items);
            $this->internalUpdate('items', count($createdItems), $bookId);
            if(count($createdItems) == 0){
                $this->setStatus($bookId, false);
            }
            $message = 'Rezerwacja powiodła się!';
        }

        return Redirect::back()->with('message', $message);
    }

    public function setStatus($id, $status){
        $this->books
            ->where('id', (int) $id)
            ->update(['status' => (boolean) $status]);
    }

    public function getBooks() {
        $allBooks = $this->books->all();

        $createdBooks = $this->createBooks->execute($allBooks);

        return $this->booksRefactor->refactor($createdBooks);
    }

    public function internalUpdate($left, $right, $id){
        $this->books
            ->where('id', (int) $id)
            ->update([$left => $right]);
    }
}
