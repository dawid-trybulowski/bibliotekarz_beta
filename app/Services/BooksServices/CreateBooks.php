<?php
/**
 * Created by PhpStorm.
 * User: Dawid
 * Date: 23.10.2017
 * Time: 19:29
 */

namespace App\Services\BooksServices;


use App\Responses\Books;

class CreateBooks
{
    protected $result = [];

    public function execute($books) {
        foreach ($books as $key => $value) {
            $book = new Books();
            $book->setId($value->id);
            $book->setTitle($value->title);
            $book->setAuthor($value->author);
            $book->setDescription($value->description);
            $book->setImageUrl($value->image_url);
            $book->setStatus($value->status);
            $book->setCreatedAt($value->created_at);
            $book->setUpdatedAt($value->updated_at);
            $result[] = $book;
        }
        return $result;
    }
}