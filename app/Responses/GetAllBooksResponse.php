<?php

namespace App\Responses;

class GetAllBooksResponse extends Response
{
    protected $books;

    /**
     * @return array
     */
    public function getBooks()
    {
        return $this->books;
    }

    /**
     * @param array $books
     */
    public function setBooks($books)
    {
        $this->books = $books;
    }
}