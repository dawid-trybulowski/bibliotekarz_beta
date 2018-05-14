<?php

namespace App\Http\Services\Content;


use App\Http\Entities\ReservationEntity;
use App\Http\Helpers\Message;
use App\Http\Services\Shared\ConfigService;
use App\Models\Book;
use App\Models\Config;
use App\Models\Items;
use App\Models\Reservations;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class ReservationsService
{
    /**
     * @var Reservations
     */
    protected $reservations;
    /**
     * @var Book
     */
    protected $books;
    /**
     * @var Items
     */
    protected $items;
    /**
     * @var Config
     */
    protected $configAll;
    /**
     * @var ConfigService
     */
    protected $configService;
    /**
     * @var WaitingListService
     */
    protected $waitingListService;
    /**
     * @var EmailService
     */
    private $emailService;
    /**
     * @var User
     */
    private $user;

    public function __construct
    (
        Reservations $reservations,
        Book $books,
        Items $items,
        Config $configAll,
        ConfigService $configService,
        WaitingListService $waitingListService,
        EmailService $emailService,
        User $user
    )
    {
        $this->reservations = $reservations;
        $this->books = $books;
        $this->items = $items;
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
        $this->waitingListService = $waitingListService;
        $this->emailService = $emailService;
        $this->user = $user;
    }

    public function getReservationsByUserId($userId)
    {
        $reservations = $this->reservations
            ->select('reservations.*', 'books.title', 'books.author')
            ->where('user_id', $userId)
            ->join('books', 'reservations.book_id', '=', 'books.id')
            ->paginate(20);

       // $preparedReservations = $this->prepareReservations($reservations);

        return $reservations;
    }

    public function prepareReservations($reservations)
    {
        $preparedReservations = [];
        foreach ($reservations as $reservation) {
            $book = $this->books
                ->select('title', 'author')
                ->where('id', $reservation->book_id)
                ->get()
                ->first();
            $reservation->book_title = $book->title;
            $reservation->book_author = $book->author;
            $preparedReservations[] = $reservation;
        }

        return $preparedReservations;
    }

    public function reserve(int $bookId, int $userId, bool $external = false)
    {
        $book = $this->books->getBookById($bookId);
        $userReservationsAmount = count($this->getActiveReservationsByUser($userId));
        $isBookReservedByUser = $this->reservations->getReservationByBookIdAndUserId($bookId, $userId);
        if (!$isBookReservedByUser) {
            if ($userReservationsAmount < (int)$this->config['max_reservation_count'] || $external) {
                if ($book->status != 0) {
                    try {
                        DB::beginTransaction();
                        $availableItem = $this->items->findFirstAvailableItem($bookId);
                        if ($availableItem) {
                            $reservationDateStart = date('Y-m-d');
                            $reservationDateEnd = date($reservationDateStart, strtotime('+3 days'));
                            $reservationEnity = $this->createReservationEntity($bookId, $userId, $availableItem->id, $reservationDateStart, $reservationDateEnd);
                            $array =
                                [
                                    'availableItem' => $availableItem,
                                    'book' => $book,
                                    'reservationEntity' => $reservationEnity
                                ];
                            $this->items->makeReservationForItem($array['availableItem']->id);
                            $this->books->makeReservationForBook($array['book']->id, $array['book']->items - 1);
                            $lastId = $this->reservations->reserve($array['reservationEntity']);
                            $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true, ['reservationId' => $lastId]);
                            DB::commit();
                        } else {
                            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 405, false);
                            DB::rollback();
                        }
                    } catch (Exception $e) {
                        $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 409, false);
                        DB::rollback();
                    }
                } else {
                    $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
                }
            } else {
                $message = new Message(__('view.Błąd'), __('view.Nie możesz zarezerwować jednocześnie więcej książek niż ') . (int)$this->config['max_reservation_count'], 200, false);
            }
        } else {
            $message = new Message(__('view.Błąd'), __('view.Już zarezerwowałeś tę pozycję'), 200, false);
        }
        return $message;
    }

    public function createReservationEntity($bookId, $userId, $availableItem, $reservationDateStart, $reservationDateEnd, $status = 1)
    {
        $reservationEntity = new ReservationEntity;
        $reservationEntity->setBookId($bookId);
        $reservationEntity->setUserId($userId);
        $reservationEntity->setItemId($availableItem);
        $reservationEntity->setReservationDateStart($reservationDateStart);
        $reservationEntity->setReservationDateEnd($reservationDateEnd);
        $reservationEntity->setStatus($status);
        return $reservationEntity;
    }

    public function getActiveReservationsByUser($userId)
    {
        $reservations = $this->reservations
            ->select('reservations.*', 'books.title', 'books.author')
            ->where([
                    ['user_id', (int)$userId],
                    ['reservations.status', 1]
                ]
            )
            ->join('books', 'reservations.book_id', '=', 'books.id')
            ->get();

        //$preparedReservations = $this->prepareReservations($reservations);

        return $reservations;
    }

    public function cancelReservation($reservationId, $userId)
    {
        $reservation = $this->reservations->getReservationByReservationId($reservationId);
        $book = $this->books->getBookById($reservation->book_id);
        try {
            DB::beginTransaction();
            if ($this->reservations->cancelReservation($reservationId, $userId)) {
                $this->books->cancelReservationForBook($book->id, $book->items + 1);
                $this->items->cancelReservationForItem($reservation->item_id);
                $waitinglist = $this->waitingListService->getWaitingListByBook($book->id);
                foreach ($waitinglist as $listElement) {
                    if ((int)$listElement->position === 1) {
                        $message = $this->reserve($book->id, $listElement->user_id, true);
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
        } catch (Exception $e) {

            DB::rollback();
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }
}