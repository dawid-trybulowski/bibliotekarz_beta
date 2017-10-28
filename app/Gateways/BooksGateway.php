<?php

namespace App\Gateways;

use App\books;
use Illuminate\Support\Facades\DB;
use PDO;

class BooksGateway
{
    protected $books;

    public function __construct(
        books $books
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



