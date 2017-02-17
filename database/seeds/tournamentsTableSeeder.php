<?php

use Illuminate\Database\Seeder;

class tournamentsTableSeeder extends Seeder
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
                'name' => "Tournoi de Footbal",
                'start_date' => "20061223 13:00:59.99",
                'img' => "20120311_11461",
                'events_id' => 1,
                'sports_id' => 1,
            ],
            [
                'name' => "Tournoi de Volley",
                'start_date' => "20061223 14:20:59.99",
                'img' => "20120311_11462",
                'events_id' => 1,
                'sports_id' => 2,
            ],
            [
                'name' => "Tournoi de Tennis",
                'start_date' => "20061223 16:00:59.99",
                'img' => "20120311_11463",
                'events_id' => 1,
                'sports_id' => 3,
            ],
            [
                'name' => "Tournoi de Badminton",
                'start_date' => "20061224 13:00:59.99",
                'img' => "20130311_11461",
                'events_id' => 1,
                'sports_id' => 4,
            ],
            [
                'name' => "Tournoi de Basketball",
                'start_date' => "20061223 13:30:59.99",
                'img' => "20120311_11411",
                'events_id' => 1,
                'sports_id' => 5,
            ],
            [
                'name' => "Tournoi de Rugby",
                'start_date' => "20071223 13:00:59.99",
                'img' => "20140311_11461",
                'events_id' => 2,
                'sports_id' => 6,
            ],
            [
                'name' => "Tournoi de Judo",
                'start_date' => "20071324 13:30:59.99",
                'img' => "20090311_11411",
                'events_id' => 2,
                'sports_id' => 7,
            ],
           	[
                'name' => "Tournoi de Petanque",
                'start_date' => "20091223 13:00:59.99",
                'img' => "20120311_11461",
                'events_id' => 3,
                'sports_id' => 10,
            ],
            [
                'name' => "Tournoi de Unihockey",
                'start_date' => "20091223 14:20:59.99",
                'img' => "20120301_11462",
                'events_id' => 3,
                'sports_id' => 9,
            ],
            [
                'name' => "Tournoi de Beachvolley",
                'start_date' => "20091223 16:00:59.99",
                'img' => "20120211_11463",
                'events_id' => 3,
                'sports_id' => 8,
            ],
            [
                'name' => "Tournoi de Judo",
                'start_date' => "20091224 13:00:59.99",
                'img' => "20030311_11461",
                'events_id' => 3,
                'sports_id' => 7,
            ],
            [
                'name' => "Tournoi de Rugby",
                'start_date' => "20091224 13:30:59.99",
                'img' => "20020311_11411",
                'events_id' => 3,
                'sports_id' => 6,
            ],
            [
                'name' => "Tournoi de Basketball",
                'start_date' => "20091224 15:00:59.99",
                'img' => "20130311_11461",
                'events_id' => 3,
                'sports_id' => 5,
            ],
            [
                'name' => "Tournoi de Badminton",
                'start_date' => "20091223 16:30:59.99",
                'img' => "20190311_11411",
                'events_id' => 3,
                'sports_id' => 4,
            ]
        ]);
    }
}
