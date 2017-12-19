<?php

namespace App\Http\Controllers;

use App\reservations;
use Illuminate\Http\Request;

class ReservationsController extends Controller
{
    protected $reservations;

    public function __construct
    (
        reservations $reservations
    )
    {
        $this->reservations = $reservations;
    }

    public function add($reservations)
    {

        foreach ($reservations as $key => $value) {
            $this->reservations
                ->insert
                (
                    [
                        'book_id' => $value->getBookId(),
                        'user_id' => $value->getUserId(),
                        'reservation_date_start' => $value->getReservationDateStart(),
                        'reservation_date_end' => $value->getReservationDateEnd(),
                        'status' => $value->getStatus()
                    ]
                );
        }
    }

    public function getReservationsByUserId($userId)
    {
        $reservations = $this->reservations
            ->get()
            ->where('user_id', $userId);
        return $reservations;
    }
}
