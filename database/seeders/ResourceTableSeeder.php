<?php

namespace Database\Seeders;

use App\Models\event;
use App\Models\Resource;
use App\Models\ResourceCategory;
use App\Models\Unit;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ResourceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i < 15; $i++) {
            Resource::create([
                'quantity' => $faker->randomDigit(),
                'value' => $faker->randomDigit(),
                'purpose' => $faker->name,
                'user_id' => User::inRandomOrder()->first()->id,

                'event_id' => event::inRandomOrder()->first()->id,
                'resource_category_id' => ResourceCategory::inRandomOrder()->first()->id,
                'unit_id' => Unit::inRandomOrder()->first()->id,
            ]);
        }
    }
}
