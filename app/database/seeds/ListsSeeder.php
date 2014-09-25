<?php

use Bakeoff\Resources\Lists\Model as Lists;

class ListsSeeder extends Seeder
{
    public function run()
    {
        DB::table('lists')->truncate();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Lists::create([
                'owner_id' => 1234,
                'title' => $faker->sentence(3)
            ]);
        }
    }
}