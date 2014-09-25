<?php

use Bakeoff\Resources\Items\Model as Items;
use Bakeoff\Resources\Lists\Model as Lists;

class ItemsSeeder extends Seeder
{
    public function run()
    {
        DB::table('items')->truncate();

        $faker = Faker\Factory::create();
        $lists = Lists::all();

        for ($i = 0; $i < 30; $i++) {
            Items::create([
                'owner_id' => 1234,
                'list_id' => $lists->random()->id,
                'assigned_to' => 1234,
                'title' => $faker->realText(100),
                'notes' => $faker->sentence(10),
                'completed' => (bool) rand(0, 1),
                'due_date' => $faker->dateTime('+4 weeks')
            ]);
        }
    }
}