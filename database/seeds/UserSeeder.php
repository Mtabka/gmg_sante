<?php
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $user = new User;
            $user->name = $faker->lastName;
            $user->first_name = $faker->firstName;
            $user->email = $faker->unique()->email;
            $user->save();
        }
    }
}
