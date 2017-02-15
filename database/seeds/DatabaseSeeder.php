<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(participantsTableSeeder::class);
        $this->call(sportsTableSeeder::class);
        $this->call(courtsTableSeeder::class);
        $this->call(eventsTableSeeder::class);
    }
}
