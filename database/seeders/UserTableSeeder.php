<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
           'name' => 'Admin',
           'email' => 'admin@admin.com',
           'password' => bcrypt('123123123')
        ]);
        $user->attachRole('Admin');
    }
}
