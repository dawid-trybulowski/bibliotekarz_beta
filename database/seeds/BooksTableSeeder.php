<?php

use App\books;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            $book = new books();
            $book->title = $faker->word;
            $book->author = $faker->name . ' ' . $faker->lastName();
            $book->description = $faker->text('512');
            $book->status = $faker->boolean();
            $random = $faker->numberBetween(1, 5);
            switch ($random) {
                case 1:
                    $img = 'antybasnie.jpg';
                    break;
                case 2:
                    $img = 'biblia.jpg';
                    break;
                case 3:
                    $img = 'lot_nad_kukulczym_gniazdem.jpg';
                    break;
                case 4:
                    $img = 'lsnienie.jpg';
                    break;
                case 5:
                    $img = 'phmspr.jpg';
            }
            $book->image_url = $img;
            $book->save();
            $book->genres()->attach($faker->numberBetween(1,25));
            $book->genres()->attach($faker->numberBetween(1,25));
        }
    }

}
