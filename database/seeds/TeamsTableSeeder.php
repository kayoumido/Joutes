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
                'name' => 'Kiwi Power',
            ],
            [
                'name' => 'LSDM',
            ],
            [
                'name' => 'La bonne biffle',
            ],
            [
                'name' => 'Le pape est vaudois',
            ]
        ]);
    }
}
