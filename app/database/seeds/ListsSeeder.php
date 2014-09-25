<?php

use Bakeoff\Resources\Lists\Model as Lists;
use Bakeoff\Resources\Users\Model as Users;

class ListsSeeder extends Seeder
{
    public function run()
    {
        DB::table('lists')->truncate();

        $faker = Faker\Factory::create();

        $users = Users::all();

        for ($i = 0; $i < 10; $i++) {
            Lists::create([
                'owner_id' => $users->random()->id,
                'title' => $faker->sentence(3)
            ]);
        }
    }
}