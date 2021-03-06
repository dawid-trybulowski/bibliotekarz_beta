<?php

namespace App\Http\Services\Admin;

use App\Http\Helpers\Message;
use App\Http\Services\Content\BorrowsService;
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
use App\Models\WaitingList;
use Illuminate\Support\Facades\DB;

class AdminBorrowsService extends BorrowsService
{
    /**
     * @var AdminUserService
     */
    private $adminUserService;
    /**
     * @var EmailService
     */
    private $emailService;
    /**
     * @var Reservations
     */
    private $reservations;
    /**
     * @var WaitingListService
     */
    private $waitingListService;
    /**
     * @var ReservationsService
     */
    private $reservationsService;
    /**
     * @var User
     */
    private $user;

    public function __construct(Borrows $borrows, Book $books, Items $items, WaitingList $waitingList, Config $configAll, ConfigService $configService, AdminUserService $adminUserService, EmailService $emailService, Reservations $reservations, WaitingListService $waitingListService, ReservationsService $reservationsService, User $user)
    {
        parent::__construct($borrows, $books, $items, $waitingList, $configAll, $configService);
        $this->adminUserService = $adminUserService;
        $this->emailService = $emailService;
        $this->reservations = $reservations;
        $this->waitingListService = $waitingListService;
        $this->reservationsService = $reservationsService;
        $this->user = $user;
    }

    public function getAllBorrows($request)
    {
        if ($request->action == 'adminSearch' && ($request->searchBy || $request->orderBy)) {
            return $this->borrows->searchByAndSortBy($request);
        }
        return $this->borrows->getAllBorrows();
    }

    public function borrow($bookId, $userId, $reservationId)
    {
        $reservation = $this->reservations->getReservationByReservationId((int)$reservationId);
        $availableItem = $this->items->getItemById((int)$reservation->item_id);
        if ($availableItem) {
            $this->items->makeBorrowForItem($availableItem->id);
            $borrowDateStart = date('Y-m-d');
            $borrowDateEnd = date('Y-m-d', strtotime('+30 days', strtotime($borrowDateStart)));
            $borrowEnity = $this->createBorrowEntity($bookId, $userId, $availableItem->id, $borrowDateStart, $borrowDateEnd, 1, $reservationId);
            $this->borrows->borrow($borrowEnity);
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    public function endBorrow($borrowId, $userId)
    {
        $borrow = $this->borrows->getBorrowByIdAndUserId($borrowId, $userId);
        $book = $this->books->getBookById($borrow->book_id);
        try {
            DB::beginTransaction();
            if ($this->borrows->endBorrow($borrowId)) {
                $this->books->cancelBorrowForBook($book->id, $book->items + 1);
                $this->items->cancelBorrowForItem($borrow->item_id);
                $waitinglist = $this->waitingListService->getWaitingListByBook($book->id);
                foreach ($waitinglist as $listElement) {
                    if ((int)$listElement->position === 1) {
                        $message = $this->reservationsService->reserve($book->id, $listElement->user_id, true);
                        if ($message->success) {
                            $reservationId = $message->additional['reservationId'];
                            $reservation = $this->reservations->getReservationByReservationId($reservationId);
                            $user = $this->user->getUserById($listElement->user_id);
                            $message = $this->waitingListService->cancelWaitingListElement($listElement->id, $listElement->user_id);
                            $this->emailService->sendEmail($user->email, env('MAIL_ADDRESS'), $this->config['reservation_email']['subject'], $this->config['reservation_email']['text'], $this->config['reservation_email']['template'],['text2' => $this->config['reservation_email']['text2'], 'reservationDateEnd' => $reservation->reservation_date_end, 'topText' => $user->login, 'book' => $book, 'reservation' => $reservation]);
                        }
                    }
                }
                DB::commit();
                $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
            } else {
                $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
                DB::rollback();
            }
        } catch (\Exception $e) {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
            DB::rollback();
        }
        return $message;
    }

    public function borrowForUser($bookId, $userId, $reservationId = 0)
    {
        $availableItem = $this->items->findFirstAvailableItem($bookId);
        if ($availableItem) {
            $this->items->makeBorrowForItem($availableItem->id);
            $itemsCount = $this->items->getAvailableItemsForBook($bookId);
            $this->books->makeBorrowForBook((int)$bookId, (int)$itemsCount);
            $borrowDateStart = date('Y-m-d');
            $borrowDateEnd = date('Y-m-d', strtotime('+30 days', strtotime($borrowDateStart)));
            $borrowEnity = $this->createBorrowEntity($bookId, $userId, $availableItem->id, $borrowDateStart, $borrowDateEnd, 1, $reservationId);
            $lastId = $this->borrows->borrow($borrowEnity);
            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem') . '. ID wypożyczenia: ' . $lastId, 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }

    public function delayBorrowsAction()
    {
        $borrows = $this->getDelayedBorrows();
        $users = [];
        foreach ($borrows as $borrow) {
            if ($borrow->status === 1) {
                $this->borrows
                    ->where('id', (int)$borrow->id)
                    ->update
                    (
                        [
                            'status' => 2
                        ]
                    );
            }
            $this->updateBorrowsDelay($borrow);
            if ($this->config['charge_fee']) {
                $this->adminUserService->updateUserDebt((int)$borrow->user_id);
            }
            if (isset($users[$borrow->user_id])) {
                $users[$borrow->user_id][] = $borrow->id;
            } else {
                $users[$borrow->user_id] = [];
                $users[$borrow->user_id][] = $borrow->id;
            }
        }
        foreach ($users as $key => $value) {
            $user = $this->adminUserService->getUserById((int)$key);
            $borrowsArray = $value;
            $borrows = [];
            foreach ($borrowsArray as $borrow) {
                $borrows[] = $this->borrows->getBorrowByIdAndUserId($borrow, $key);
            }

            $additonal =
                [
                    'borrows' => $borrows,
                    'topText' => $user->login,
                    'signature' => $this->config['library_name'],
                    'debt' => $user->debt
                ];

            $this->emailService->sendEmail($user->email, env('MAIL_ADDRESS'), $this->config['delay_email']['subject'], $this->config['delay_email']['text'], 'emails/delayEmail', $additonal);
        }
    }

    private function getDelayedBorrows()
    {
        $date = date('Y-m-d');
        return $borrows = $this->borrows
            ->select('borrows.*', 'books.title', 'books.author', 'users.first_name', 'users.second_name', 'users.surname', 'users.email')
            ->join('users', 'borrows.user_id', '=', 'users.id')
            ->join('books', 'borrows.book_id', '=', 'books.id')
            ->join('items', 'borrows.item_id', '=', 'items.id')
            ->whereIn('borrows.status', [1, 2])
            ->where('borrow_date_end', '<', $date)
            ->get();
    }

    private function updateBorrowsDelay($borrow)
    {
        $delay = (int)$borrow->delay + 1;
        $delay_cost = $this->config['charge_fee'] ? (int)$borrow->delay_cost + (int)$this->config['delay_cost'] : (int)$borrow->delay_cos;
        $this->borrows
            ->where('id', $borrow->id)
            ->update
            (
                [
                    'delay' => $delay,
                    'delay_cost' => $delay_cost
                ]
            );
    }
}