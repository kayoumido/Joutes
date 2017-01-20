<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            [
                'name' => 'SI-TIA',
            ],
            [
                'name' => 'Team PRW2',
            ],
            [
                'name' => 'CFC3',
            ],
            [
                'name' => 'FPA',
            ]
        ]);
    }
}
