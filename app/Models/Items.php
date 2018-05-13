<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
    public function books()
    {
        return $this->hasOne('App\Models\Book', 'id', 'book_id');
    }

    public function makeReservationForItem(int $itemId)
    {
        $this
            ->where('id', $itemId)
            ->update(
                [
                    'status' => 1
                ]);
    }

    public function makeBorrowForItem(int $itemId)
    {
        $this
            ->where('id', $itemId)
            ->update(
                [
                    'status' => 1
                ]);
    }

    public function findFirstAvailableItem(int $bookId)
    {
        $item = $this
            ->where(
                [
                    ['book_id', '=', $bookId],
                    ['status', '=', 0]
                ]
            )
            ->get()
            ->first();

        return $item;
    }

    public function findFirstItemOfBook(int $bookId)
    {
        $item = $this
            ->where(
                [
                    ['book_id', '=', $bookId]
                ]
            )
            ->get()
            ->first();
        return $item;
    }

    public function cancelReservationForItem($itemId)
    {
        $this
            ->where('id', $itemId)
            ->update(
                [
                    'status' => 0
                ]);
    }

    public function getAllItems()
    {
        return $this
            ->where('items.active', true)
            ->join('books', 'items.book_id', '=', 'books.id')
            ->select('items.*', 'books.title', 'books.author')
            ->orderBy('id', 'asc')
            ->paginate(20);
    }

    public function cancelBorrowForItem($itemId)
    {
        $this
            ->where('id', $itemId)
            ->update(
                [
                    'status' => 0
                ]);
    }

    public function getItemById(int $itemId)
    {
        return $this
            ->where('id', $itemId)
            ->get()
            ->first();
    }

    public function searchByAndSortBy($request)
    {
        $searchBy = $request->searchBy;
        $text = $request->text;
        $orderBy = $request->orderBy;
        $orderDirection = $request->orderDirection;

        if ($searchBy !== 'items.id') {
            $items = $this
                ->where($searchBy, 'LIKE', '%' . $text . '%')
                ->join('books', 'items.book_id', '=', 'books.id')
                ->select('items.*', 'books.title', 'books.author')
                ->orderBy($orderBy, $orderDirection)
                ->paginate(20);
        } else {
            $items = $this
                ->where($searchBy, (int)$text)
                ->join('books', 'items.book_id', '=', 'books.id')
                ->select('items.*', 'books.title', 'books.author')
                ->orderBy($orderBy, $orderDirection)
                ->paginate(20);
        }

        return $items;
    }

    public function getAvailableItemsForBook($bookId)
    {
        return $this
            ->where(
                [
                    ['status', '=', 0],
                    ['book_id', '=', (int)$bookId]
                ]
            )
            ->count();
    }

    public function deleteItem($itemId)
    {
        return $this
            ->where('id', (int)$itemId)
            ->update(
                [
                    'visible' => 0
                ]
            );
    }
}
