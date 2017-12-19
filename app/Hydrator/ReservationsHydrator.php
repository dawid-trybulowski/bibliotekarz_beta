<?php
/**
 * Created by PhpStorm.
 * User: Dawid
 * Date: 03.12.2017
 * Time: 10:43
 */

namespace App\Hydrator;


use App\Responses\Reservations;

class ReservationsHydrator
{
    protected $result = [];

    public function execute($itemId, $userId, $reservationDateStart, $reservationDateEnd, $status) {

            $book = new Reservations();
            $book->setItemId($itemId);
            $book->setUserId($userId);
            $book->setReservationDateStart($reservationDateStart);
            $book->setReservationDateEnd($reservationDateEnd);
            $book->setStatus($status);
            $result[] = $book;

        return $result;
    }
}