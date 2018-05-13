<?php

use App\Models\BooksHaveGenres;
use Illuminate\Database\Seeder;

class BooksHaveGenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i < 101; $i++) {
            $BooksHaveGenres = new BooksHaveGenres();
            $BooksHaveGenres->book_id = $i;
            $BooksHaveGenres->genre_id = $faker->numberBetween(1,25);
            $BooksHaveGenres->save();
        }

        for ($i = 1; $i < 101; $i++) {
            $BooksHaveGenres = new BooksHaveGenres();
            $BooksHaveGenres->book_id = $i;
            $BooksHaveGenres->genre_id = $faker->numberBetween(1,25);
            $BooksHaveGenres->save();
        }
    }
}
