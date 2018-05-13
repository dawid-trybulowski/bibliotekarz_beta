<?php

namespace App\Http\Services\Content;

use App\Models\Categories;

class CategoriesService
{
    /**
     * @var Categories
     */
    protected $categories;

    public function __construct
    (
        Categories $categories
    )
    {
        $this->categories = $categories;
    }
}