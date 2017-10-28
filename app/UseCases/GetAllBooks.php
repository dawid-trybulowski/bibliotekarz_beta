<?php


namespace App\UseCases;

use App\Gateways\BooksGateway;
use Mockery\Exception;

class GetAllBooks
{
    protected $booksGateway;

    public function __construct(
        BooksGateway $booksGateway
    )
    {
        $this->booksGateway = $booksGateway;
    }

    public function execute()
    {

        try {
            $data = $this->booksGateway->GetAllBooks();
            return $data->toArray();
        } catch (Exception $e) {
            $data = ['Errors' => 'Error Connecting to the API'];
            return $data->toArray();
        }
    }
}