<?php

use Illuminate\Database\Seeder;

class ParticipantsHasTeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participants_has_teams')->insert([
            [
                'fk_participants' => 1,
                'fk_teams'        => 1,
            ],
            [
                'fk_participants' => 2,
                'fk_teams'        => 2,
            ],
            [
                'fk_participants' => 3,
                'fk_teams'        => 3,
            ],
            [
                'fk_participants' => 4,
                'fk_teams'        => 4,
            ]
        ]);
    }
}
