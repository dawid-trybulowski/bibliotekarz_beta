<?php

namespace App\Http\Services\Content;


use App\Http\Entities\CommentAndRateEntity;
use App\Http\Helpers\Message;
use App\Models\CommentsAndRates;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class CommentsAndRatesService
{
    /**
     * @var CommentsAndRates
     */
    private $commentsAndRates;
    /**
     * @var User
     */
    private $users;
    /**
     * @var BooksService
     */
    private $booksService;

    public function __construct
    (
        CommentsAndRates $commentsAndRates,
        User $users,
        BooksService $booksService
    )
    {
        $this->commentsAndRates = $commentsAndRates;
        $this->users = $users;
        $this->booksService = $booksService;
    }

    public function addCommentAndRate(string $comment = '', int $rate = null, int $bookId, int $userId, bool $status = true)
    {
        DB::beginTransaction();
        try {
            $commentAndRateEntity = $this->createCommentsAndRatesEntity(null, $comment, $rate, $bookId, $userId, $status);
            if ($this->commentsAndRates->addCommentAndRate($commentAndRateEntity)) {
                $result = $this->booksService->updateBookRate($bookId, $rate);
                if ($result) {
                    $message = new Message(__('view.W porządku!'), __('view.Twoja opinia została dodana'), 200, true);
                    DB::commit();
                } else {
                    DB::rollback();
                    $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 409, false);
                }
            } else {
                DB::rollback();
                $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 404, false);
            }
        } catch (Exception $e) {
            DB::rollback();
            $message = new Message(__('view.Błąd'), __('view.Wystąpił błąd podczas zapisu danych'), 406, false);
        }

        return $message;
    }

    public function createCommentsAndRatesEntity(int $id = null, string $comment = '', int $rate = null, int $bookId, int $userId, bool $status)
    {
        $commentAndRateEntity = new CommentAndRateEntity();

        $commentAndRateEntity->setId($id);
        $commentAndRateEntity->setComment($comment);
        $commentAndRateEntity->setRate($rate);
        $commentAndRateEntity->setBookId($bookId);
        $commentAndRateEntity->setUserId($userId);
        $commentAndRateEntity->setStatus($status);

        return $commentAndRateEntity;
    }

    public function getComments()
    {
        $comments = $this->commentsAndRates->all();

        $commentsArray = $this->createComments($comments);

        return $commentsArray;
    }

    public function createComments($comments)
    {
        $commentsArray = [];
        foreach ($comments as $comment) {
            $user = $this->users->select('login')->where('id', '=', $comment->user_id)->first();
            $comment->user = $user;
            $commentsArray[$comment->book_id][] = $comment;
        }
        return $commentsArray;
    }
}