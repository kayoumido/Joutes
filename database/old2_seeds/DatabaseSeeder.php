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
        $this->call(usersTableSeeder::class);
        $this->call(tournamentsTableSeeder::class);
        $this->call(teamsTableSeeder::class);
        $this->call(participants_teamsTableSeeder::class);
        $this->call(poolsTableSeeder::class);
        $this->call(pools_teamsTableSeeder::class);
        $this->call(gamesTableSeeder::class);
    }
}
