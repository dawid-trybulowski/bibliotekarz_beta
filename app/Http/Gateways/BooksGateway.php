<?php

namespace App\Gateways;

use App\Models\Book;
use Illuminate\Support\Facades\DB;
use PDO;

class BooksGateway
{
    protected $books;

    public function __construct(
        Book $books
    )
    {
        $this->books = $books;
    }

    public function GetAllBooks()
    {
        return DB::table('books')
            ->get();
    }
}



