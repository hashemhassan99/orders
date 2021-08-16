<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(MaintainceCategoryTableSeeder::class);
        $this->call(MaintainceTableSeeder::class);
        $this->call(StatusTableSeeder::class);
        $this->call(ResourceCategoryTableSeeder::class);
        $this->call(UnitTableSeeder::class);
        $this->call(ResourceTableSeeder::class);

    }
}
