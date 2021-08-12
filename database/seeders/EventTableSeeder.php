<?php

namespace Database\Seeders;

use App\Models\event;
use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        event::create([
            'event_name' => 'Closed'
        ]);

        event::create([
            'event_name' => 'New'
        ]);

        event::create([
            'event_name' => 'Underway'
        ]);

        event::create([
            'event_name' => 'Delayed'
        ]);

        event::create([
            'event_name' => 'Accepted'
        ]);
    }
}
