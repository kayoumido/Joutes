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
        $this->call(SportsTableSeeder::class);
        $this->call(ParticipantsTableSeeder::class);
        $this->call(CourtsTableSeeder::class);
        $this->call(TeamsTableSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(TournamentsTableSeeder::class);
        $this->call(ParticipantsHasTeamsTableSeeder::class);
        $this->call(TournamentsHasCourtsTableSeeder::class);
        $this->call(TournamentsHasTeamsTableSeeder::class);
    }
}
