<?php

use App\items;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 100; $i++) {
            $item = new items();
            $item->book_id = $i;
            $item->publication_year = $faker->year();
            $item->rented = false;
            $item->save();
        }

        for ($i = 1; $i <= 100; $i++) {
            $item = new items();
            $item->book_id = $i;
            $item->publication_year = $faker->year();
            $item->rented = false;
            $item->save();
        }
    }
}
