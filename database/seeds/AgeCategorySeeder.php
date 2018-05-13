<?php

use App\Models\AgeCategories;
use Illuminate\Database\Seeder;

class AgeCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ageCategory = new AgeCategories();
        $ageCategory->name = "0-3lat";
        $ageCategory->min_age = 1;
        $ageCategory->max_age = 3;
        $ageCategory->save();
        $ageCategory = new AgeCategories();
        $ageCategory->name = "4-6 lat";
        $ageCategory->min_age = 4;
        $ageCategory->max_age = 6;
        $ageCategory->save();
        $ageCategory = new AgeCategories();
        $ageCategory->name = "7-12 lat";
        $ageCategory->min_age = 11;
        $ageCategory->max_age = 17;
        $ageCategory->save();
        $ageCategory = new AgeCategories();
        $ageCategory->name = "13-18 lat";
        $ageCategory->min_age = 13;
        $ageCategory->max_age = 18;
        $ageCategory->save();
        $ageCategory = new AgeCategories();
        $ageCategory->name = "Tylko dla dorosłych";
        $ageCategory->min_age = 18;
        $ageCategory->max_age = 1000;
        $ageCategory->save();
    }
}
