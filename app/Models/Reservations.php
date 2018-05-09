<?php

namespace App\Models;

use App\Http\Entities\ReservationEntity;
use Illuminate\Database\Eloquent\Model;

class Reservations extends Model
{
    public function reserve(ReservationEntity $reservationEntity)
    {
        return $this
            ->insertGetId(
                [
                    'book_id' => $reservationEntity->getBookId(),
                    'user_id' => $reservationEntity->getUserId(),
                    'item_id' => $reservationEntity->getItemId(),
                    'reservation_date_start' => $reservationEntity->getReservationDateStart(),
                    'reservation_date_end' => $reservationEntity->getReservationDateEnd(),
                    'status' => $reservationEntity->getStatus()
                ]
            );
    }

    public function cancelReservation($reservationId, $userId)
    {
        return $this
            ->where(
                [
                    ['id', '=', $reservationId],
                    ['user_id', '=', $userId]
                ]
            )
            ->update(
                [
                    'status' => 0
                ]
            );
    }

    public function getReservationByReservationId($reservationId)
    {
        $reservation = $this
            ->where('id', (int)$reservationId)
            ->get()
            ->first();
        return $reservation;
    }

    public function getAllReservations()
    {
        return $this
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->join('books', 'reservations.book_id', '=', 'books.id')->join('items', 'reservations.item_id', '=', 'items.id')
            ->select('reservations.*', 'books.title', 'books.author', 'users.first_name', 'users.second_name', 'users.surname', 'users.card_number')
            ->paginate(20);
    }

    public function borrowReservation($reservationId, $borrowId)
    {
        $this
            ->where('id', $reservationId)
            ->update
            (
                [
                    'status' => 2,
                    'borrow_id' => $borrowId
                ]
            );
    }

    public function searchByAndSortBy($request)
    {
        $searchBy = $request->searchBy;
        $text = $request->text;
        $orderBy = $request->orderBy;
        $orderDirection = $request->orderDirection;

        if (strpos($searchBy, 'id') == 0) {
            $reservations = $this
                ->select('reservations.*', 'books.title', 'books.author', 'users.first_name', 'users.second_name', 'users.surname', 'users.card_number')
                ->join('users', 'reservations.user_id', '=', 'users.id')
                ->join('books', 'reservations.book_id', '=', 'books.id')->join('items', 'reservations.item_id', '=', 'items.id')
                ->where($searchBy, 'LIKE', '%' . $text . '%')
                ->orderBy($orderBy, $orderDirection)
                ->paginate(20);
        } else {
            $reservations = $this
                ->select('reservations.*', 'books.title', 'books.author', 'users.first_name', 'users.second_name', 'users.surname', 'users.card_number')
                ->join('users', 'reservations.user_id', '=', 'users.id')
                ->join('books', 'reservations.book_id', '=', 'books.id')
                ->join('items', 'reservations.item_id', '=', 'items.id')
                ->where($searchBy, (int)$text)
                ->orderBy($orderBy, $orderDirection)
                ->paginate(20);
        }

        return $reservations;
    }

    public function getReservationByBookIdAndUserId($bookId, $userId)
    {
        return $this
            ->where(
                [
                    'book_id' => (int)$bookId,
                    'user_id' => (int)$userId,
                    'status' => 1
                ]
            )
            ->count();
    }

    public function getDelayedReservations()
    {
        $date = date('Y-m-d');
        return $this
            ->select('reservations.*', 'books.title', 'books.author', 'users.first_name', 'users.second_name', 'users.surname', 'users.card_number')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->join('books', 'reservations.book_id', '=', 'books.id')
            ->join('items', 'reservations.item_id', '=', 'items.id')
            ->where(
                [
                    ['reservations.status', 1],
                    ['reservation_date_end', '<', $date]
                ]
            )
            ->get();
    }
}
