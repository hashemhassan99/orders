<?php

namespace Database\Seeders;

use App\Models\ResourceCategory;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ResourceCategoryTableSeeder extends Seeder
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
            ResourceCategory::create([
                'name' => $faker->name
            ]);
        }
    }
}
