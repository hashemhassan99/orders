<?php

namespace Database\Seeders;

use App\Models\event;
use App\Models\Maintaince;
use App\Models\MaintainceCategory;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class MaintainceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i <= 14; $i++) {
            Maintaince::create([
                'description' => $faker->text,
                'user_id' => User::inRandomOrder()->first()->id,
                'event_id' => event::inRandomOrder()->first()->id,
                'maintaince_category_id' => MaintainceCategory::inRandomOrder()->first()->id,
            ]);
        }
    }
}
