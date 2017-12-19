<?php
/**
 * Created by PhpStorm.
 * User: Dawid
 * Date: 03.12.2017
 * Time: 10:00
 */

namespace App\Services\BooksServices;


use App\Responses\Reservations;
use App\Responses\Response;

class CreateReservations
{
    public function execute($reservations) {
        $result = [];
        foreach ($reservations as $key => $value) {
            $reservation = new Reservations();
            $reservation->setId($value->id);
            $reservation->setItemId($value->item_id);
            $reservation->setUserId($value->user_id);
            $reservation->setReservationDateStart($value->reservation_date_start);
            $reservation->setReservationDateEnd($value->reservation_date_end);
            $reservation->setStatus($value->status);
            if(isset($value->title) && isset($value->author))
            {
                $reservation->setTitle($value->title);
                $reservation->setAuthor($value->author);
            }
            $reservation->setCreatedAt($value->created_at);
            $reservation->setUpdatedAt($value->updated_at);
            $result[] = $reservation;
        }
        return $result;
    }
}