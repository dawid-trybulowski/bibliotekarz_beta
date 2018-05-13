<?php

namespace App\Models;

use App\Http\Entities\CommentAndRateEntity;
use Illuminate\Database\Eloquent\Model;

class CommentsAndRates extends Model
{
    public function addCommentAndRate(CommentAndRateEntity $commentAndRateEntity){
       return $this
            ->insert(
                [
                    'comment' => $commentAndRateEntity->getComment(),
                    'user_id' => $commentAndRateEntity->getUserId(),
                    'book_id' => $commentAndRateEntity->getBookId(),
                    'rate' => $commentAndRateEntity->getRate(),
                    'status' => $commentAndRateEntity->getStatus()
                ]
            );
    }
}
