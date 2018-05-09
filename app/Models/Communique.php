<?php

namespace App\Models;

use App\Http\Entities\CommuniqueEntity;
use Illuminate\Database\Eloquent\Model;

class Communique extends Model
{
    public function getAllCommuniques()
    {
        return $this
            ->getAll();
    }

    public function addNewCommunique(CommuniqueEntity $communiqueEntity)
    {
        return $this
            ->insert(
                [
                    'user_id' => $communiqueEntity->getUserId(),
                    'user_name' => $communiqueEntity->getUserName(),
                    'text' => $communiqueEntity->getText()
                ]
            );

    }
}