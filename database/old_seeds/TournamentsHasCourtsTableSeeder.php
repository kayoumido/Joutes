<?php

use Illuminate\Database\Seeder;

class TournamentsHasCourtsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tournaments_has_courts')->insert([
            [
                'fk_tournaments' => 1,
                'fk_courts'      => 1,
            ],
            [
                'fk_tournaments' => 1,
                'fk_courts'      => 2,
            ],
            [
                'fk_tournaments' => 2,
                'fk_courts'      => 3,
            ]
        ]);
    }
}
