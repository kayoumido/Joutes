<?php

use Illuminate\Database\Seeder;

class TournamentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tournaments')->insert([
            [
                'name'       => 'Tournoi football Ste-Croix',
                'start_date' => date("Y-m-d"),
                'end_date'   => date("Y-m-d"),
                'start_time' => date("H:i"),
                'end_time'   => date("H:i"),
                'fk_events'  => 1,
            ],
            [
                'name'       => 'Dream Volley',
                'start_date' => date("Y-m-d"),
                'end_date'   => date("Y-m-d"),
                'start_time' => date("H:i"),
                'end_time'   => date("H:i"),
                'fk_events'  => 2,
            ]
        ]);
    }
}
