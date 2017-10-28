<?php

use App\genres;
use Illuminate\Database\Seeder;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $genre = new Genres();
            $genre->name = $faker->word;
            $genre->save();
        }
    }
}
