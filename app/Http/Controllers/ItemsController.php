<?php

namespace App\Http\Controllers;

use App\items;
use Illuminate\Http\Request;

class ItemsController extends Controller
{
    protected $items;

    public function __construct
    (
        items $items
    )
    {
        $this->items = $items;
    }

    public function getAvailableItems
    (
        $bookId
    )
    {
        return $this->items
            ->get()
            ->where('book_id', $bookId)
            ->where('rented', 0);
    }

    public function reservation
    (
        \App\Responses\Items $item,
        $userId
    )
    {
        $this->items
            ->where('id', $item->getId())
            ->update
            (
                [
                    'rented' => true,
                    'rent_user' => (int)$userId,
                    'rent_end' => '2017-11-30'
                ]
            );

    }
}
