<?php

namespace App\Http\Services\Admin;

use App\Http\Helpers\Message;
use App\Http\Services\Content\EmailService;
use App\Http\Services\Content\ReservationsService;
use App\Http\Services\Content\WaitingListService;
use App\Http\Services\Shared\ConfigService;
use App\Models\Book;
use App\Models\Borrows;
use App\Models\Config;
use App\Models\Items;
use App\Models\Reservations;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class AdminReservationsService extends ReservationsService
{
    protected $adminBorrowsService;
    /**
     * @var Borrows
     */
    protected $borrows;

    public function __construct(Reservations $reservations, Book $books, Items $items, Config $configAll, ConfigService $configService, WaitingListService $waitingListService, EmailService $emailService, User $user, AdminBorrowsService $adminBorrowsService, Borrows $borrows)
    {
        parent::__construct($reservations, $books, $items, $configAll, $configService, $waitingListService, $emailService, $user);
        $this->adminBorrowsService = $adminBorrowsService;
        $this->borrows = $borrows;
    }

    public function getAllReservations($request)
    {
        if ($request->action == 'adminSearch' && ($request->searchBy || $request->orderBy)) {
            return $this->reservations->searchByAndSortBy($request);
        }
        return $this->reservations->getAllReservations();
    }

    public function confirmReservation($reservationId)
    {
        $reservation = $this->reservations->getReservationByReservationId($reservationId);

        DB::beginTransaction();
        $borrowResult = $this->adminBorrowsService->borrow($reservation->book_id, $reservation->user_id, $reservationId);
        if ($borrowResult->success) {
            $borrow = $this->borrows
                ->get()
                ->where('reservation_id', $reservationId)
                ->first();
            $this->reservations->borrowReservation($reservationId, $borrow->id);
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem') . 'ID wypożyczenia: ' . $borrow->id, 200, true);
            DB::commit();
        } else {
            $message = $borrowResult;
            DB::rollback();
        }
        return $message;
    }

    public function delayReservationsAction()
    {
        $reservations = $this->reservations->getDelayedReservations();
        foreach ($reservations as $reservation) {
            $this->cancelReservation($reservation->id, $reservation->user_id);
        }
    }
}