<?php

namespace App\Http\Services\Content;


use App\Http\Entities\WaitingListEntity;
use App\Http\Helpers\Message;
use App\Models\Book;
use App\Models\WaitingList;
use Mockery\Exception;

class WaitingListService
{
    /**
     * @var WaitingList
     */
    private $waitingList;
    /**
     * @var Book
     */
    private $books;

    public function __construct
    (
        WaitingList $waitingList,
        Book $books
    )
    {

        $this->waitingList = $waitingList;
        $this->books = $books;
    }

    public function addUserToWaitingList(int $bookId, int $userId)
    {
        $book = $this->books->getBookById($bookId);
        $isPositionOnWaitingList = $this->waitingList->getWaitingListByBookAndUserId($bookId, $userId);
        if (!$isPositionOnWaitingList) {
            if ((int)$book->status === 0) {
                try {
                    $position = $this->countPosition($bookId);
                    $waitingListEntity = $this->createWaitingListEntity($userId, $bookId, $position, 1);
                    $this->waitingList->addUserToWaitingList($waitingListEntity);
                    $message = new Message(__('view.W porządku!'), __('view.Operacja zakonczona sukcesem'), 200, true);
                } catch (Exception $e) {
                    $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
                }
            } else {
                $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
            }
        } else {
            $message = new Message(__('view.Błąd'), __('view.Już zamówiłeś tę pozycję'), 200, false);
        }
        return $message;
    }

    public function createWaitingListEntity(int $userId, int $bookId, int $position, int $status)
    {
        $waitingListEntity = new WaitingListEntity();

        $waitingListEntity->setUserId((int)$userId);
        $waitingListEntity->setBookId((int)$bookId);
        $waitingListEntity->setPosition((int)$position);
        $waitingListEntity->setStatus((int)$status);

        return $waitingListEntity;
    }

    private function countPosition(int $bookId)
    {
        $lastPosition = $this->waitingList->CountWaitingListsByBookId($bookId);
        return $lastPosition + 1;
    }

    public function getWaitingListByUser(int $userId)
    {
        $waitingList = $this->waitingList->getWaitingListByUser($userId);

        return $waitingList;
    }

    public function getWaitingListByBook(int $bookId)
    {
        $waitingList = $this->waitingList->getWaitingListByBook($bookId);

        return $waitingList;
    }

    public function cancelWaitingListElement(int $waitingListId, int $userId)
    {
        $waitingListElement = $this->waitingList->getWaitingListElementById($waitingListId);
        if ($this->waitingList->cancelElement($waitingListId, $userId)) {
            $this->waitingList->decrementPosition($waitingListElement->book_id, $waitingListElement->position);
            $message = new Message(__('view.W porządku!'), __('view.Zamówienie anulowane'), 200, true);
        } else {
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
        }
        return $message;
    }
}