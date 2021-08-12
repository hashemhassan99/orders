<?php

namespace Database\Seeders;

use App\Models\Unit;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UnitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        for ($i = 0; $i <= 20; $i++) {
            Unit::create([
                'name' => $faker->name,
            ]);
        }
    }
}
