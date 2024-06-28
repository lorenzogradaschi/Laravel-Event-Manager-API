<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 users
        \App\Models\User::factory(10)->create();

        // Seed Events and Attendees
        $this->call([
            EventSeeder::class,
            AttendeeSeeder::class,
        ]);
    }
}
