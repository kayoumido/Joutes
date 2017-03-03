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
        DB::table('contender')->insert([

        	//POOL 1
            [
                'rank_in_pool' => "1",
                'pool_id' => 1,
                'team_id' => 1,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 1,
                'team_id' => 2,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 1,
                'team_id' => 3,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 1,
                'team_id' => 4,
                'from_pool_id' => NULL,
            ],

            //POOL 2
            [
                'rank_in_pool' => "1",
                'pool_id' => 2,
                'team_id' => 5,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 2,
                'team_id' => 6,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 2,
                'team_id' => 7,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 2,
                'team_id' => 8,
                'from_pool_id' => NULL,
            ],

            //POOL 3
            [
                'rank_in_pool' => "1",
                'pool_id' => 3,
                'team_id' => 9,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 3,
                'team_id' => 10,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 3,
                'team_id' => 11,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 3,
                'team_id' => 12,
                'from_pool_id' => NULL,
            ],

            //POOL 4
            [
                'rank_in_pool' => "1",
                'pool_id' => 4,
                'team_id' => 13,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 4,
                'team_id' => 14,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 4,
                'team_id' => 15,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 4,
                'team_id' => 16,
                'from_pool_id' => NULL,
            ],

            //POOL 5
            [
                'rank_in_pool' => "1",
                'pool_id' => 5,
                'team_id' => 17,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 5,
                'team_id' => 18,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 5,
                'team_id' => 19,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 5,
                'team_id' => 20,
                'from_pool_id' => NULL,
            ],

            //POOL 6
            [
                'rank_in_pool' => "1",
                'pool_id' => 6,
                'team_id' => 21,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 6,
                'team_id' => 22,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 6,
                'team_id' => 23,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 6,
                'team_id' => 24,
                'from_pool_id' => NULL,
            ],

            //POOL 7
            [
                'rank_in_pool' => "1",
                'pool_id' => 7,
                'team_id' => 25,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 7,
                'team_id' => 26,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 7,
                'team_id' => 27,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 7,
                'team_id' => 28,
                'from_pool_id' => NULL,
            ],

            //POOL 8
            [
                'rank_in_pool' => "1",
                'pool_id' => 8,
                'team_id' => 29,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 8,
                'team_id' => 30,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 8,
                'team_id' => 31,
                'from_pool_id' => NULL,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 8,
                'team_id' => 32,
                'from_pool_id' => NULL,
            ],

            // ------------------------ WINNER
            
            //POOL 9
            [
                'rank_in_pool' => "1",
                'pool_id' => 9,
                'team_id' => 1,
                'from_pool_id' => 1,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 9,
                'team_id' => 2,
                'from_pool_id' => 1,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 9,
                'team_id' => 5,
                'from_pool_id' => 2,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 9,
                'team_id' => 6,
                'from_pool_id' => 2,
            ],

            //POOL 10
            [
                'rank_in_pool' => "1",
                'pool_id' => 10,
                'team_id' => 9,
                'from_pool_id' => 3,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 10,
                'team_id' => 10,
                'from_pool_id' => 3,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 10,
                'team_id' => 13,
                'from_pool_id' => 4,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 10,
                'team_id' => 14,
                'from_pool_id' => 4,
            ],

            //POOL 11
            [
                'rank_in_pool' => "1",
                'pool_id' => 11,
                'team_id' => 17,
                'from_pool_id' => 5,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 11,
                'team_id' => 18,
                'from_pool_id' => 5,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 11,
                'team_id' => 21,
                'from_pool_id' => 6,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 11,
                'team_id' => 22,
                'from_pool_id' => 6,
            ],

            //POOL 12
            [
                'rank_in_pool' => "1",
                'pool_id' => 12,
                'team_id' => 25,
                'from_pool_id' => 7,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 12,
                'team_id' => 26,
                'from_pool_id' => 7,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 12,
                'team_id' => 29,
                'from_pool_id' => 8,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 12,
                'team_id' => 30,
                'from_pool_id' => 8,
            ],


            // ------------------------ LOOSER
            
            //POOL 13
            [
                'rank_in_pool' => "1",
                'pool_id' => 13,
                'team_id' => 3,
                'from_pool_id' => 1,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 13,
                'team_id' => 4,
                'from_pool_id' => 1,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 13,
                'team_id' => 7,
                'from_pool_id' => 2,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 13,
                'team_id' => 8,
                'from_pool_id' => 2,
            ],

            //POOL 14
            [
                'rank_in_pool' => "1",
                'pool_id' => 14,
                'team_id' => 11,
                'from_pool_id' => 3,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 14,
                'team_id' => 12,
                'from_pool_id' => 3,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 14,
                'team_id' => 15,
                'from_pool_id' => 4,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 14,
                'team_id' => 16,
                'from_pool_id' => 4,
            ],

            //POOL 15
            [
                'rank_in_pool' => "1",
                'pool_id' => 15,
                'team_id' => 19,
                'from_pool_id' => 5,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 15,
                'team_id' => 20,
                'from_pool_id' => 5,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 15,
                'team_id' => 23,
                'from_pool_id' => 6,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 15,
                'team_id' => 24,
                'from_pool_id' => 6,
            ],

            //POOL 16
            [
                'rank_in_pool' => "1",
                'pool_id' => 16,
                'team_id' => 27,
                'from_pool_id' => 7,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 16,
                'team_id' => 28,
                'from_pool_id' => 7,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 16,
                'team_id' => 31,
                'from_pool_id' => 8,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 16,
                'team_id' => 32,
                'from_pool_id' => 8,
            ],

            // ------------------------ DEMI-FINALE
            
            //POOL 17
            [
                'rank_in_pool' => "1",
                'pool_id' => 17,
                'team_id' => 1,
                'from_pool_id' => 9,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 17,
                'team_id' => 2,
                'from_pool_id' => 9,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 17,
                'team_id' => 9,
                'from_pool_id' => 10,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 17,
                'team_id' => 10,
                'from_pool_id' => 10,
            ],

            //POOL 18
            [
                'rank_in_pool' => "1",
                'pool_id' => 18,
                'team_id' => 17,
                'from_pool_id' => 9,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 18,
                'team_id' => 18,
                'from_pool_id' => 9,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 18,
                'team_id' => 25,
                'from_pool_id' => 10,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 18,
                'team_id' => 26,
                'from_pool_id' => 10,
            ],

            // ------------------------ FINALE (Classement)
             
            //POOL 19
            [
                'rank_in_pool' => "1",
                'pool_id' => 19,
                'team_id' => 1,
                'from_pool_id' => 17,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 19,
                'team_id' => 2,
                'from_pool_id' => 17,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 19,
                'team_id' => 9,
                'from_pool_id' => 17,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 19,
                'team_id' => 10,
                'from_pool_id' => 17,
            ],
            [
                'rank_in_pool' => "1",
                'pool_id' => 19,
                'team_id' => 17,
                'from_pool_id' => 18,
            ],
            [
                'rank_in_pool' => "2",
                'pool_id' => 19,
                'team_id' => 18,
                'from_pool_id' => 18,
            ],
            [
                'rank_in_pool' => "3",
                'pool_id' => 19,
                'team_id' => 25,
                'from_pool_id' => 18,
            ],
            [
                'rank_in_pool' => "4",
                'pool_id' => 19,
                'team_id' => 26,
                'from_pool_id' => 18,
            ]

        ]);
    }
}
