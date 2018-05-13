<?php

use App\Models\Items;
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

        for ($i = 1; $i < 200; $i++) {
            $item = new Items();
            $item->book_id = $i;
            $item->status = 0;
            $item->save();
        }

        for ($i = 1; $i < 200; $i++) {
            $item = new Items();
            $item->book_id = $i;
            $item->status = 0;
            $item->save();
        }
    }
}
