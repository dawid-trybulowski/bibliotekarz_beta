<?php

namespace App\Models;

use App\Http\Entities\BorrowEntity;
use Illuminate\Database\Eloquent\Model;

class Borrows extends Model
{
    public function borrow(BorrowEntity $borrowEntity){
        return $this
            ->insertGetId(
                [
                    'book_id' => $borrowEntity->getBookId(),
                    'user_id' => $borrowEntity->getUserId(),
                    'item_id' => $borrowEntity->getItemId(),
                    'borrow_date_start' => $borrowEntity->getBorrowDateStart(),
                    'borrow_date_end' => $borrowEntity->getBorrowDateEnd(),
                    'status' => $borrowEntity->getStatus(),
                    'reservation_id' => $borrowEntity->getReservationId()
                ]
            );
    }

    public function getBorrowByIdAndUserId($borrowId, $userId){
        return $this
            ->select('borrows.*', 'books.title', 'books.author', 'users.first_name', 'users.second_name', 'users.surname')
            ->join('users', 'borrows.user_id', '=', 'users.id')
            ->join('books', 'borrows.book_id', '=', 'books.id')
            ->join('items', 'borrows.item_id', '=', 'items.id')
            ->where(
                [
                    ['borrows.id', (int) $borrowId],
                    ['user_id', (int) $userId]
                ]
            )
            ->get()
            ->first();
    }

    public function extend($reservationId, $borrowDateEnd){
        return $this
            ->where('id', $reservationId)
            ->update(
                [
                    'borrow_date_end' => $borrowDateEnd,
                    'extended' => 1
                ]
            );
    }

    public function getAllBorrows(){
        return $this
            ->join('users', 'borrows.user_id', '=', 'users.id')
            ->join('books', 'borrows.book_id', '=', 'books.id')
            ->join('items', 'borrows.item_id', '=', 'items.id')
            ->select('borrows.*', 'books.title', 'books.author', 'users.first_name', 'users.second_name', 'users.surname')
            ->orderBy('id', 'DESC')
            ->paginate(20);
    }

    public function endBorrow($borrowId){
        return $this
            ->where(
                [
                    ['id', '=', $borrowId]
                ]
            )
            ->update(
                [
                    'status' => 0
                ]
            );
    }
    public function searchByAndSortBy($request)
    {
        $searchBy = $request->searchBy;
        $text = $request->text;
        $orderBy = $request->orderBy;
        $orderDirection = $request->orderDirection;

        if($request->searchBy) {
            if (strpos($searchBy, 'id') == 0) {
                $borrows = $this
                    ->select('borrows.*', 'books.title', 'books.author', 'users.first_name', 'users.second_name', 'users.surname')
                    ->join('users', 'borrows.user_id', '=', 'users.id')
                    ->join('books', 'borrows.book_id', '=', 'books.id')
                    ->join('items', 'borrows.item_id', '=', 'items.id')
                    ->where($searchBy, 'LIKE', '%' . $text . '%')
                    ->orderBy($orderBy, $orderDirection)
                    ->paginate(20);
            } else {
                $borrows = $this
                    ->select('borrows.*', 'books.title', 'books.author', 'users.first_name', 'users.second_name', 'users.surname')
                    ->join('users', 'borrows.user_id', '=', 'users.id')
                    ->join('books', 'borrows.book_id', '=', 'books.id')
                    ->join('items', 'borrows.item_id', '=', 'items.id')
                    ->where($searchBy, (int)$text)
                    ->orderBy($orderBy, $orderDirection)
                    ->paginate(20);
            }
        }else{
            $borrows = $this
                ->select('borrows.*', 'books.title', 'books.author', 'users.first_name', 'users.second_name', 'users.surname')
                ->join('users', 'borrows.user_id', '=', 'users.id')
                ->join('books', 'borrows.book_id', '=', 'books.id')
                ->join('items', 'borrows.item_id', '=', 'items.id')
                ->orderBy($orderBy, $orderDirection)
                ->paginate(20);
        }
        return $borrows;
    }


}
