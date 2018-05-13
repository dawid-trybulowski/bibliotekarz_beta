<?php

use App\Models\Categories;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Categories();
        $category->name = "Książka";
        $category->save();
        $category = new Categories();
        $category->name = "Tomik poezji";
        $category->save();
        $category = new Categories();
        $category->name = "Komiks";
        $category->save();
        $category = new Categories();
        $category->name = "Album";
        $category->save();
        $category = new Categories();
        $category->name = "Audiobook";
        $category->save();

    }
}
