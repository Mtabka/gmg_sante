<?php
use App\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder {

    public function run()
    {
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $task = new Task;
            $task->name = $faker->lastName;
            $task->description = $faker->text;
            $task->user_id = array_rand([1,2,3,4,5,6,7,8,9,10]);
            $task->save();
        }
    }
}
