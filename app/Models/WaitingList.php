<?php

namespace App\Models;

use App\Http\Entities\WaitingListEntity;
use Illuminate\Database\Eloquent\Model;

class WaitingList extends Model
{
    public function CountWaitingListsByBookId(int $bookId)
    {
        $lastPosition = $this
            ->where
            (
                [
                    ['book_id', '=', (int)$bookId],
                    ['status', '=', 1]
                ]
            )
            ->max('position');

        return $lastPosition;
    }

    public function addUserToWaitingList(WaitingListEntity $waitingListEntity)
    {
        $result = $this
            ->insert(
                [
                    'user_id' => $waitingListEntity->getUserId(),
                    'book_id' => $waitingListEntity->getBookId(),
                    'position' => $waitingListEntity->getPosition(),
                    'status' => $waitingListEntity->getStatus()
                ]
            );

        return $result;
    }

    public function checkIfBookIsOnWaitingList($bookId)
    {
        return $this
            ->where(
                [
                    ['book_id', $bookId],
                    ['status', 1]
                ]
            )
            ->count();
    }

    public function getWaitingListByUser(int $userId)
    {
        return $this
            ->where
            (
                [
                    ['waiting_lists.user_id', (int)$userId],
                    ['waiting_lists.status', 1]
                ]
            )
            ->join('books', 'waiting_lists.book_id', '=', 'books.id')
            ->select('waiting_lists.*', 'books.title', 'books.author')
            ->get();
    }

    public function getWaitingListByBook(int $bookId)
    {
        return $this
            ->where
            (
                [
                    ['waiting_lists.book_id', (int)$bookId],
                    ['waiting_lists.status', 1]
                ]
            )
            ->join('books', 'waiting_lists.book_id', '=', 'books.id')
            ->select('waiting_lists.*', 'books.title', 'books.author')
            ->get();
    }

    public function cancelElement(int $waitingListId, int $userId)
    {
        return $this
            ->where
            (
                [
                    ['waiting_lists.id', (int)$waitingListId],
                    ['waiting_lists.user_id', (int)$userId]
                ]
            )
            ->update
            (
                [
                    'status' => 0
                ]
            );
    }

    public function decrementPosition(int $bookId, $position)
    {
        return $this
            ->where(
                [
                    ['book_id', (int)$bookId],
                    ['position', '>', (int)$position]
                ]
            )
            ->decrement('position');
    }

    public function getWaitingListElementById(int $waitingListId)
    {
        return $this
            ->where('id', (int)$waitingListId)
            ->get()
            ->first();
    }

    public function getWaitingListByBookAndUserId($bookId, $userId)
    {
        return $this
            ->where(
                [
                   'book_id' => (int) $bookId,
                   'user_id' => (int) $userId,
                    'status' => 1
                ]
            )
            ->count();
    }
}
