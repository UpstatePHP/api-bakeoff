<?php

use Bakeoff\Resources\Users\Model as User;

class UsersSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->truncate();

        $faker = Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            $user = new User([
                'email' => $faker->safeEmail,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'avatar_url' => rand(0, 1) ? $faker->url : null
            ]);
            $user->password = Hash::make($faker->word);
            $user->save();
        }
    }
}