<?php

use App\Models\Location;
use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $location = new Location();
        $location->name = 'Główna';
        $location->address = 'ul. Testowa 1, 00-000 Testowo';
        $location->save();
    }
}
