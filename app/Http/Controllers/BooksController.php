<?php

namespace App\Http\Controllers;

use App\books;
use App\Services\BooksServices\BooksRefactor;
use App\Services\BooksServices\CreateBooks;
use App\UseCases\GetAllBooks;
use App\UseCases\GetAllBooksPresenter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class BooksController extends Controller
{
    protected $books;

    protected $createBooks;

    protected $booksRefactor;

    public function __construct(
        books $books,
        CreateBooks $createBooks,
        BooksRefactor $booksRefactor
    )
    {
        $this->books = $books;
        $this->createBooks = $createBooks;
        $this->booksRefactor = $booksRefactor;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBooks = $this->books->all();

        $createdBooks = $this->createBooks->execute($allBooks);

        $refactoredBooks = $this->booksRefactor->refactor($createdBooks);



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
        //
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
}
