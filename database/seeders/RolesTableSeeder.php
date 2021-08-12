<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Role::create([
            'name' => 'Admin',
            'display_name' => 'admin',
            'description' => 'can do any thing'
        ]);

        $user = Role::create([
            'name' => 'User',
            'display_name' => 'user',
            'description' => 'can do specific task'
        ]);
    }
}
