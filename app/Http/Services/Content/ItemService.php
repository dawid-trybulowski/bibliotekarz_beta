<?php

namespace App\Http\Services\Content;


use App\Models\Items;

class ItemService
{
    /**
     * @var Items
     */
    protected $items;

    public function __construct
    (
        Items $items
    )
    {

        $this->items = $items;
    }

    public function getItemById(int $itemId)
    {
        return $this->items->getItemById($itemId);
    }
}