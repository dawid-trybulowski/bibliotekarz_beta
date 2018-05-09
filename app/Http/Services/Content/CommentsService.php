<?php
/**
 * Created by PhpStorm.
 * User: Dawid
 * Date: 02.03.2018
 * Time: 10:40
 */

namespace App\Http\Services\Content;

use App\Models\User;

class CommentsService
{
    /**
     * @var User
     */
    private $users;

    public function __construct
    (
        User $users
    )
    {
        $this->users = $users;
    }

    public function createComments($comments){
        $commentsArray = [];
        foreach ($comments as $comment){
            $user = $this->users->select('first_name', 'surname')->where('id', '=', $comment->user_id)->first();
            $comment->user = $user;
            $commentsArray[$comment->book_id][] = $comment;
        }
        return $commentsArray;
    }
}