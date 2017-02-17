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
                'number' => "1",
                'tournaments_id' => 1,
            ],
         	[
                'start_time' => "08:00:00",
                'end_time' => "10:00:00",
                'number' => "2",
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "08:00:00",
                'end_time' => "10:00:00",
                'number' => "3",
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "08:00:00",
                'end_time' => "10:00:00",
                'number' => "4",
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "08:00:00",
                'end_time' => "10:00:00",
                'number' => "5",
                'tournaments_id' => 1,
            ],
         	[
                'start_time' => "08:00:00",
                'end_time' => "10:00:00",
                'number' => "6",
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "08:00:00",
                'end_time' => "10:00:00",
                'number' => "7",
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "08:00:00",
                'end_time' => "10:00:00",
                'number' => "8",
                'tournaments_id' => 1,
            ],

            // WINNER
            [
                'start_time' => "10:00:00",
                'end_time' => "12:00:00",
                'number' => "9",
                'tournaments_id' => 1,
            ],
         	[
                'start_time' => "10:00:00",
                'end_time' => "12:00:00",
                'number' => "10",
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "10:00:00",
                'end_time' => "12:00:00",
                'number' => "11",
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "10:00:00",
                'end_time' => "12:00:00",
                'number' => "12",
                'tournaments_id' => 1,
            ],

            // LOOSER
            [
                'start_time' => "10:00:00",
                'end_time' => "12:00:00",
                'number' => "13",
                'tournaments_id' => 1,
            ],
         	[
                'start_time' => "10:00:00",
                'end_time' => "12:00:00",
                'number' => "14",
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "10:00:00",
                'end_time' => "12:00:00",
                'number' => "15",
                'tournaments_id' => 1,
            ],
            [
                'start_time' => "10:00:00",
                'end_time' => "12:00:00",
                'number' => "16",
                'tournaments_id' => 1,
            ],

            // DEMI-FINALE
            [
                'start_time' => "13:30:00",
                'end_time' => "15:30:00",
                'number' => "17",
                'tournaments_id' => 1,
            ],
         	[
                'start_time' => "13:30:00",
                'end_time' => "15:30:00",
                'number' => "18",
                'tournaments_id' => 1,
            ],

			// FINALE (Classement)
            [
                'start_time' => "15:30:00",
                'end_time' => "18:00:00",
                'number' => "19",
                'tournaments_id' => 1,
            ]

        ]);
    }
}
