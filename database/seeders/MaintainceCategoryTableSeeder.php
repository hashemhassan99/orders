<?php

namespace Database\Seeders;

use App\Models\MaintainceCategory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class MaintainceCategoryTableSeeder extends Seeder
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
            MaintainceCategory::create([
                'name' => $faker->name
            ]);
        }

    }
}
