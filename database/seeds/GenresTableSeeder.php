<?php

use App\Models\Genres;
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
        $genre = new Genres();
        $genre->name = 'Fantastyka';
        $genre->save();
        $genre = new Genres();
        $genre->name = 'Horror';
        $genre->save();
        $genre = new Genres();
        $genre->name = 'Powieść obyczajowa';
        $genre->save();
        $genre = new Genres();
        $genre->name = 'Wiersze polskie';
        $genre->save();
        $genre = new Genres();
        $genre->name = 'Kryminał';
        $genre->save();
        $genre = new Genres();
        $genre->name = 'Naukowa';
        $genre->save();
    }
}
