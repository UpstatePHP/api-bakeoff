<?php

use Bakeoff\Resources\Items\Model as Items;
use Bakeoff\Resources\Lists\Model as Lists;
use Bakeoff\Resources\Users\Model as Users;

class ItemsSeeder extends Seeder
{
    public function run()
    {
        DB::table('items')->truncate();

        $faker = Faker\Factory::create();
        $lists = Lists::all();
        $users = Users::all();

        for ($i = 0; $i < 30; $i++) {
            Items::create([
                'owner_id' => $users->random()->id,
                'list_id' => $lists->random()->id,
                'assigned_to' => $users->random()->id,
                'title' => $faker->realText(100),
                'notes' => $faker->sentence(10),
                'completed' => (bool) rand(0, 1),
                'due_date' => $faker->dateTime('+4 weeks')
            ]);
        }
    }
}