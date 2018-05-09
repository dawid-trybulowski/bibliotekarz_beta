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
        $ageCategory->name = "3-6";
        $ageCategory->min_age = 3;
        $ageCategory->max_age = 6;
        $ageCategory->save();
        $ageCategory = new AgeCategories();
        $ageCategory->name = "7-10";
        $ageCategory->min_age = 7;
        $ageCategory->max_age = 10;
        $ageCategory->save();
        $ageCategory = new AgeCategories();
        $ageCategory->name = "11-16";
        $ageCategory->min_age = 11;
        $ageCategory->max_age = 17;
        $ageCategory->save();
        $ageCategory = new AgeCategories();
        $ageCategory->name = "Tylko dla dorosłych";
        $ageCategory->min_age = 18;
        $ageCategory->max_age = 1000;
        $ageCategory->save();
    }
}
