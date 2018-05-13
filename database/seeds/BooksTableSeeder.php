<?php

use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
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
            $book = new Book();
            $book->title = $faker->word . ' ' . $faker->word;
            $book->unified_title = $book->title;
            $book->author = $faker->randomLetter . '. ' . $faker->lastName();
            $book->description = $faker->text('512');
            $book->subauthors = $faker->randomLetter . '. ' . $faker->lastName() . ', ' . $faker->randomLetter . '. ' . $faker->lastName();
            $book->status = 1;
            $book->content_description = 'test';
            $book->items = 2;
            $random = $faker->numberBetween(1, 4);
            switch ($random) {
                case 1:
                    $img = 'biblia.jpg';
                    break;
                case 2:
                    $img = 'book_2.jpg';
                    break;
                case 3:
                    $img = 'book_3.jpg';
                    break;
                case 4:
                    $img = null;
                    break;
            }
            $book->image_url = $img;
            $book->category_id = $faker->numberBetween(1, 5);
            $book->age_category_id = $faker->numberBetween(1, 4);
            $book->isbn = $faker->numberBetween(100, 999) . '-' . $faker->numberBetween(0, 10) . '-' . $faker->numberBetween(1000, 9999) . '-' . $faker->numberBetween(1000, 9999) . '-' . $faker->numberBetween(0, 10);
            $book->publishing_house = $faker->word;
            $book->pages = $faker->numberBetween(20, 999);
            $book->edition = $faker->numberBetween(0, 10);
            $book->publication_year =  $faker->year();
            $book->location_id = 1;
            $book->publishing_house = $faker->word;
            $book->keys = $faker->word . ',' . $faker->word . ',' . $faker->word;
            $book->save();
            $book->genres()->attach($faker->numberBetween(1, 6));
        }
    }

}
