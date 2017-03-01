<?php

use Illuminate\Database\Seeder;

class pools_teamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pools_teams')->insert([

        	//POOL 1
            [
                'rank_in_pool' => "1",
                'pools_id' => 1,
                'teams_id' => 1,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 1,
                'teams_id' => 2,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 1,
                'teams_id' => 3,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 1,
                'teams_id' => 4,
                'from_pool_id' => NULL,
            ],

            //POOL 2
            [
                'rank_in_pool' => "1",
                'pools_id' => 2,
                'teams_id' => 5,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 2,
                'teams_id' => 6,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 2,
                'teams_id' => 7,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 2,
                'teams_id' => 8,
                'from_pool_id' => NULL,
            ],

            //POOL 3
            [
                'rank_in_pool' => "1",
                'pools_id' => 3,
                'teams_id' => 9,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 3,
                'teams_id' => 10,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 3,
                'teams_id' => 11,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 3,
                'teams_id' => 12,
                'from_pool_id' => NULL,
            ],

            //POOL 4
            [
                'rank_in_pool' => "1",
                'pools_id' => 4,
                'teams_id' => 13,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 4,
                'teams_id' => 14,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 4,
                'teams_id' => 15,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 4,
                'teams_id' => 16,
                'from_pool_id' => NULL,
            ],

            //POOL 5
            [
                'rank_in_pool' => "1",
                'pools_id' => 5,
                'teams_id' => 17,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 5,
                'teams_id' => 18,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 5,
                'teams_id' => 19,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 5,
                'teams_id' => 20,
                'from_pool_id' => NULL,
            ],

            //POOL 6
            [
                'rank_in_pool' => "1",
                'pools_id' => 6,
                'teams_id' => 21,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 6,
                'teams_id' => 22,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 6,
                'teams_id' => 23,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 6,
                'teams_id' => 24,
                'from_pool_id' => NULL,
            ],

            //POOL 7
            [
                'rank_in_pool' => "1",
                'pools_id' => 7,
                'teams_id' => 25,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 7,
                'teams_id' => 26,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 7,
                'teams_id' => 27,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 7,
                'teams_id' => 28,
                'from_pool_id' => NULL,
            ],

            //POOL 8
            [
                'rank_in_pool' => "1",
                'pools_id' => 8,
                'teams_id' => 29,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 8,
                'teams_id' => 30,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 8,
                'teams_id' => 31,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 8,
                'teams_id' => 32,
                'from_pool_id' => NULL,
            ],

            // ------------------------ WINNER
            
            //POOL 9
            [
                'rank_in_pool' => "1",
                'pools_id' => 9,
                'teams_id' => 1,
                'from_pool_id' => 1,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 9,
                'teams_id' => 2,
                'from_pool_id' => 1,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 9,
                'teams_id' => 5,
                'from_pool_id' => 2,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 9,
                'teams_id' => 6,
                'from_pool_id' => 2,
            ],

            //POOL 10
            [
                'rank_in_pool' => "1",
                'pools_id' => 10,
                'teams_id' => 9,
                'from_pool_id' => 3,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 10,
                'teams_id' => 10,
                'from_pool_id' => 3,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 10,
                'teams_id' => 13,
                'from_pool_id' => 4,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 10,
                'teams_id' => 14,
                'from_pool_id' => 4,
            ],

            //POOL 11
            [
                'rank_in_pool' => "1",
                'pools_id' => 11,
                'teams_id' => 17,
                'from_pool_id' => 5,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 11,
                'teams_id' => 18,
                'from_pool_id' => 5,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 11,
                'teams_id' => 21,
                'from_pool_id' => 6,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 11,
                'teams_id' => 22,
                'from_pool_id' => 6,
            ],

            //POOL 12
            [
                'rank_in_pool' => "1",
                'pools_id' => 12,
                'teams_id' => 25,
                'from_pool_id' => 7,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 12,
                'teams_id' => 26,
                'from_pool_id' => 7,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 12,
                'teams_id' => 29,
                'from_pool_id' => 8,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 12,
                'teams_id' => 30,
                'from_pool_id' => 8,
            ],


            // ------------------------ LOOSER
            
            //POOL 13
            [
                'rank_in_pool' => "1",
                'pools_id' => 13,
                'teams_id' => 3,
                'from_pool_id' => 1,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 13,
                'teams_id' => 4,
                'from_pool_id' => 1,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 13,
                'teams_id' => 7,
                'from_pool_id' => 2,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 13,
                'teams_id' => 8,
                'from_pool_id' => 2,
            ],

            //POOL 14
            [
                'rank_in_pool' => "1",
                'pools_id' => 14,
                'teams_id' => 11,
                'from_pool_id' => 3,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 14,
                'teams_id' => 12,
                'from_pool_id' => 3,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 14,
                'teams_id' => 15,
                'from_pool_id' => 4,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 14,
                'teams_id' => 16,
                'from_pool_id' => 4,
            ],

            //POOL 15
            [
                'rank_in_pool' => "1",
                'pools_id' => 15,
                'teams_id' => 19,
                'from_pool_id' => 5,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 15,
                'teams_id' => 20,
                'from_pool_id' => 5,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 15,
                'teams_id' => 23,
                'from_pool_id' => 6,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 15,
                'teams_id' => 24,
                'from_pool_id' => 6,
            ],

            //POOL 16
            [
                'rank_in_pool' => "1",
                'pools_id' => 16,
                'teams_id' => 27,
                'from_pool_id' => 7,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 16,
                'teams_id' => 28,
                'from_pool_id' => 7,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 16,
                'teams_id' => 31,
                'from_pool_id' => 8,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 16,
                'teams_id' => 32,
                'from_pool_id' => 8,
            ],

            // ------------------------ DEMI-FINALE
            
            //POOL 17
            [
                'rank_in_pool' => "1",
                'pools_id' => 17,
                'teams_id' => 1,
                'from_pool_id' => 9,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 17,
                'teams_id' => 2,
                'from_pool_id' => 9,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 17,
                'teams_id' => 9,
                'from_pool_id' => 10,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 17,
                'teams_id' => 10,
                'from_pool_id' => 10,
            ],

            //POOL 18
            [
                'rank_in_pool' => "1",
                'pools_id' => 18,
                'teams_id' => 17,
                'from_pool_id' => 9,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 18,
                'teams_id' => 18,
                'from_pool_id' => 9,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 18,
                'teams_id' => 25,
                'from_pool_id' => 10,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 18,
                'teams_id' => 26,
                'from_pool_id' => 10,
            ],

            // ------------------------ FINALE (Classement)
             
            //POOL 19
            [
                'rank_in_pool' => "1",
                'pools_id' => 19,
                'teams_id' => 1,
                'from_pool_id' => 17,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 19,
                'teams_id' => 2,
                'from_pool_id' => 17,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 19,
                'teams_id' => 9,
                'from_pool_id' => 17,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 19,
                'teams_id' => 10,
                'from_pool_id' => 17,
            ],
            [
                'rank_in_pool' => "1",
                'pools_id' => 19,
                'teams_id' => 17,
                'from_pool_id' => 18,
            ],
            [
                'rank_in_pool' => "2",
                'pools_id' => 19,
                'teams_id' => 18,
                'from_pool_id' => 18,
            ],
            [
                'rank_in_pool' => "3",
                'pools_id' => 19,
                'teams_id' => 25,
                'from_pool_id' => 18,
            ],
            [
                'rank_in_pool' => "4",
                'pools_id' => 19,
                'teams_id' => 26,
                'from_pool_id' => 18,
            ]

        ]);
    }
}
