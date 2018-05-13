<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GenresTableSeeder::class);
        $this->call(AgeCategorySeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(LocationsTableSeeder::class);
        $this->call(BooksTableSeeder::class);
        $this->call(BooksHaveGenresTableSeeder::class);
        $this->call(ItemsTableSeeder::class);
        $this->call(ConfigTableSeeder::class);
    }
}
