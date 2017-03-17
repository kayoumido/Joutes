<?php

use Illuminate\Database\Seeder;

class poolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pools')->insert([
            [
                'start_time' => "08:00:00",
                'end_time' => "10:00:00",
                'poolName' => "Pool 1",
                'gameType' => "Simple",
                'stage' => 1,
                'tournaments_id' => 1,
            ],
         	[
                'start_time' => "08:00:00",
                'end_time' => "10:00:00",
                'poolName' => "Pool 2",
                'gameType' => "Simple",
                'stage' => 1,
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "08:00:00",
                'end_time' => "10:00:00",
                'poolName' => "Pool 3",
                'gameType' => "Simple",
                'stage' => 1,
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "08:00:00",
                'end_time' => "10:00:00",
                'poolName' => "Pool 4",
                'gameType' => "Simple",
                'stage' => 1,
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "08:00:00",
                'end_time' => "10:00:00",
                'poolName' => "Pool 5",
                'gameType' => "Simple",
                'stage' => 1,
                'tournaments_id' => 1,
            ],
         	[
                'start_time' => "08:00:00",
                'end_time' => "10:00:00",
                'poolName' => "Pool 6",
                'gameType' => "Simple",
                'stage' => 1,
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "08:00:00",
                'end_time' => "10:00:00",
                'poolName' => "Pool 7",
                'gameType' => "Simple",
                'stage' => 1,
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "08:00:00",
                'end_time' => "10:00:00",
                'poolName' => "Pool 8",
                'gameType' => "Simple",
                'stage' => 1,
                'tournaments_id' => 1,
            ],

            // WINNER
            [
                'start_time' => "10:00:00",
                'end_time' => "12:00:00",
                'poolName' => "Pool winner 1",
                'gameType' => "Simple",
                'stage' => 2,
                'tournaments_id' => 1,
            ],
         	[
                'start_time' => "10:00:00",
                'end_time' => "12:00:00",
                'poolName' => "Pool winner 2",
                'gameType' => "Simple",
                'stage' => 2,
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "10:00:00",
                'end_time' => "12:00:00",
                'poolName' => "Pool winner 3",
                'gameType' => "Simple",
                'stage' => 2,
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "10:00:00",
                'end_time' => "12:00:00",
                'poolName' => "Pool winner 4",
                'gameType' => "Simple",
                'stage' => 2,
                'tournaments_id' => 1,
            ],

            // LOOSER
            [
                'start_time' => "10:00:00",
                'end_time' => "12:00:00",
                'poolName' => "Pool looser 1",
                'gameType' => "Simple",
                'stage' => 3,
                'tournaments_id' => 1,
            ],
         	[
                'start_time' => "10:00:00",
                'end_time' => "12:00:00",
                'poolName' => "Pool looser 2",
                'gameType' => "Simple",
                'stage' => 3,
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "10:00:00",
                'end_time' => "12:00:00",
                'poolName' => "Pool looser 3",
                'gameType' => "Simple",
                'stage' => 3,
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "10:00:00",
                'end_time' => "12:00:00",
                'poolName' => "Pool looser 4",
                'gameType' => "Simple",
                'stage' => 3,
                'tournaments_id' => 1,
            ],

            // DEMI-FINALE
            [
                'start_time' => "13:30:00",
                'end_time' => "15:30:00",
                'poolName' => "Pool demi-finale 1",
                'gameType' => "Simple",
                'stage' => 4,
                'tournaments_id' => 1,
            ],
         	[
                'start_time' => "13:30:00",
                'end_time' => "15:30:00",
                'poolName' => "Pool demi-finale 2",
                'gameType' => "Simple",
                'stage' => 4,
                'tournaments_id' => 1,
            ],

			// FINALE (Classement)
            [
                'start_time' => "15:30:00",
                'end_time' => "18:00:00",
                'poolName' => "Pool final",
                'gameType' => "Simple",
                'stage' => 5,
                'tournaments_id' => 1,
            ]

        ]);
    }
}
