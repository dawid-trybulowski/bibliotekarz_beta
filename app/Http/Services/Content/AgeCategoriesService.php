<?php

namespace App\Http\Services\Content;


use App\Models\AgeCategories;

class AgeCategoriesService
{
    /**
     * @var AgeCategories
     */
    protected $ageCategories;

    public function __construct
    (
        AgeCategories $ageCategories
    )
    {
        $this->ageCategories = $ageCategories;
    }
}