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
            ->where('status', 0);
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
                    'status' => 1
                ]
            );

    }
}
