<?php
/**
 * Created by PhpStorm.
 * User: Dawid
 * Date: 21.11.2017
 * Time: 14:47
 */

namespace App\Services\BooksServices;


use App\Responses\Items;

class CreateItems
{
    public function execute($items) {
        $result = [];
        foreach ($items as $key => $value) {
            $item = new Items();
            $item->setId($value->id);
            $item->setPublicationYear($value->publication_year);
            $item->setRented($value->rented);
            $item->setRentUser($value->rent_user);
            $item->setRentEnd($value->rent_end);
            $item->setCreatedAt($value->created_at);
            $item->setUpdatedAt($value->updated_at);
            $result[] = $item;
        }
        return $result;
    }
}