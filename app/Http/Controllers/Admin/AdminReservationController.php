<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Content\ReservationController;
use App\Http\Services\Admin\AdminReservationsService;
use App\Http\Services\Content\ReservationsService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AdminReservationController extends ReservationController
{
    /**
     * @var AdminReservationsService
     */
    private $adminReservationsService;

    public function __construct(ReservationsService $reservationsService, AdminReservationsService $adminReservationsService)
    {
        parent::__construct($reservationsService);
        $this->adminReservationsService = $adminReservationsService;
    }

    public function cancelReservation(Request $request)
    {
        $userId = (int) $request->userId;
        $reservationId = (int)$request->reservationId;

        $message =  $this->adminReservationsService->cancelReservation($reservationId, $userId);

        return Redirect::back()->with('message', $message);
    }

    public function confirmReservation(Request $request)
    {
        $reservationId = (int)$request->reservationId;

        $message =  $this->adminReservationsService->confirmReservation($reservationId);

        return Redirect::back()->with('message', $message);
    }

    public function delayReservationsAction()
    {
        $this->adminReservationsService->delayReservationsAction();
    }
}