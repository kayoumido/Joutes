<?php

use Illuminate\Database\Seeder;

class TournamentsHasTeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tournaments_has_teams')->insert([
            [
                'fk_tournaments' => 1,
                'fk_teams'       => 1,
            ],
            [
                'fk_tournaments' => 1,
                'fk_teams'       => 2,
            ],
            [
                'fk_tournaments' => 2,
                'fk_teams'       => 3,
            ],
            [
                'fk_tournaments' => 2,
                'fk_teams'       => 4,
            ]
        ]);
    }
}
