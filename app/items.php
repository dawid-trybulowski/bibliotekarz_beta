<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class items extends Model
{
    public function books()
    {
        return $this->hasOne('App\books', 'id', 'book_id');
    }
}
