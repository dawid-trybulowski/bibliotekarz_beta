<?php

namespace App\Http\Services\Content;


use App\Http\Entities\BorrowEntity;
use App\Http\Helpers\Message;
use App\Http\Services\Shared\ConfigService;
use App\Models\Book;
use App\Models\Borrows;
use App\Models\Config;
use App\Models\Items;
use App\Models\Reservations;
use App\Models\User;
use App\Models\WaitingList;
use http\Exception;
use Illuminate\Support\Facades\Auth;

class BorrowsService
{
    /**
     * @var Book
     */
    protected $books;
    /**
     * @var Borrows
     */
    protected $borrows;
    /**
     * @var Items
     */
    protected $items;
    /**
     * @var WaitingList
     */
    protected $waitingList;

    protected $config;
    /**
     * @var Config
     */
    private $configAll;
    /**
     * @var ConfigService
     */
    private $configService;

    public function __construct
    (
        Borrows $borrows,
        Book $books,
        Items $items,
        WaitingList $waitingList,
        Config $configAll,
        ConfigService $configService
    )
    {
        $this->books = $books;
        $this->borrows = $borrows;
        $this->items = $items;
        $this->waitingList = $waitingList;
        $this->configAll = $configAll;
        $this->configService = $configService;
        $this->config = $this->configService->prepareConfigs($this->configAll->all());
    }

    public function getBorrowsByUserId($userId)
    {
        $borrows = $this->borrows
            ->where('user_id', $userId)
            ->get();

        return $borrows;
    }

    public function prepareBorrows($borrows)
    {
        $preparedBorrows = [];
        foreach ($borrows as $borrow) {
            $book = $this->books
                ->select('title', 'author')
                ->where('id', $borrow->book_id)
                ->get()
                ->first();
            $borrow->book_title = $book->title;
            $borrow->book_author = $book->author;
            $preparedBorrows[] = $borrow;
        }

        return $preparedBorrows;
    }

    public function getPreparedBorrows($userId)
    {
        $borrows = $this->getBorrowsByUserId($userId);

        return $this->prepareBorrows($borrows);
    }

    public function getDelayedBorrowsByUserId($userId)
    {
        $dealayedBorrows = $this->borrows
            ->where([
                ['user_id', '=', (int)$userId],
                ['status', '=', 2]
                ])
            ->orWhere([
                ['user_id', '=', (int)$userId],
                ['status', '=', 3]
            ])
            ->get();
        $this->prepareBorrows($dealayedBorrows);

        return $dealayedBorrows;
    }

    public function createBorrowEntity($bookId, $userId, $availableItem, $borrowDateStart, $borrowDateEnd, $status = 1, $reservationId=null)
    {
        $borrowEntity = new BorrowEntity;
        $borrowEntity->setBookId($bookId);
        $borrowEntity->setUserId($userId);
        $borrowEntity->setItemId($availableItem);
        $borrowEntity->setBorrowDateStart($borrowDateStart);
        $borrowEntity->setBorrowDateEnd($borrowDateEnd);
        $borrowEntity->setStatus($status);
        $borrowEntity->setReservationId($reservationId);
        return $borrowEntity;
    }

    public function getActiveReservationsByUser($userId) {
        $reservations = $this->reservations
            ->where([
                    ['user_id', (int)$userId],
                    ['status', 1]
                ]
            )
            ->get();

        $preparedReservations = $this->prepareReservations($reservations);

        return $preparedReservations;
    }

    public function getActiveBorrowsByUserId($userId){
        $borrows = $this->borrows
            ->where([
                    ['user_id', (int)$userId],
                    ['status', 1]
                ]
            )
            ->orWhere([
                ['user_id', '=', (int)$userId],
                ['status', '=', 2]
            ]
            )
            ->get();

        $preparedBorrows = $this->prepareBorrows($borrows);

        return $preparedBorrows;
    }

    public function extendBorrow($borrowId, $userId){
        $borrow = $this->borrows->getBorrowByIdAndUserId($borrowId, $userId);
        if($borrow && !$borrow->extended){
            if(!$this->waitingList->checkIfBookIsOnWaitingList($borrow->book_id)){
                $borrowDateEnd = date('Y-m-d', strtotime('+30 days',strtotime($borrow->borrow_date_end)));
                if($this->borrows->extend($borrowId, $borrowDateEnd)){
                    $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
                }
                else {
                    $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
                }
            }
            else{
                $message = new Message(__('view.Książka zamówiona'), __('view.Przedłużenie niemożliwe, ktoś czeka na tę pozycję'), 200, false);
            }
        }
        else{
            $message = new Message(__('view.Błąd'), __('view.Wypożyczenie tej pozycji było już przdłużane. W celu przedłużenia skontaktuj się z biblioteką'), 200, false);
        }
        return $message;
    }
}