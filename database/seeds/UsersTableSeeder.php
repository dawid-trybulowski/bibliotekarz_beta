<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
            $user = new User();
            $user->email = $faker->email;
            $user->password = $faker->password;
            $user->first_name = $faker->name;
            $user->second_name = $faker->name;
            $user->surname = $faker->lastName;
            $user->city = $faker->city;
            $user->street = $faker->word;
            $user->house_number = $faker->numberBetween(1, 1000);
            $user->apartment_number = $faker->numberBetween(1, 100);
            $user->post_code = $faker->postcode;
            $user->birth_date = $faker->date();
            $user->verified = $faker->boolean();
            $user->save();
        }
    }
}
