<?php

namespace Database\Seeders;

use App\Models\event;
use App\Models\Status;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 0; $i <= 10; $i++) {
            Status::create([
                'transformer' => $faker->name,
                'description' => $faker->text,
                'notes' => $faker->text,
                'procedure' => $faker->text,
                'user_id' => User::inRandomOrder()->first()->id,

                'event_id' => event::inRandomOrder()->first()->id,

            ]);
        }
    }
}
