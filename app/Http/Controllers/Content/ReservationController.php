<?php

namespace App\Http\Controllers\Content;

use App\Http\Services\Content\ReservationsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ReservationController
{
    /**
     * @var ReservationsService
     */
    protected $reservationsService;

    public function __construct
    (
        ReservationsService $reservationsService
    )
    {
        $this->reservationsService = $reservationsService;
    }

    public function reserve(Request $request)
    {

        $message = $this->reservationsService->reserve((int)$request->bookId, Auth::User()->id);

        return Redirect::back()->with('message', $message);
    }

    public function activeReservationsByUser()
    {
        $userId = Auth::User()->id;

        return $this->reservationsService->getActiveReservationsByUser($userId);

    }

    public function cancelReservation(Request $request)
    {
        $userId = (Auth::check() && Auth::User()->permission < 2) ? Auth::User()->id : $request->userId ;
        $reservationId = (int)$request->reservationId;

        $message =  $this->reservationsService->cancelReservation($reservationId, $userId);

        return Redirect::back()->with('message', $message);
    }
}