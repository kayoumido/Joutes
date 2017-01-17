<?php

use Illuminate\Database\Seeder;

class SportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sports')->insert([
            [
                'name' => 'Football',
                'description' => 'Equipes de 9',
            ],
            [
                'name' => 'Rugby',
                'description' => 'Equipes de 10',
            ],
            [
                'name' => 'Volley',
                'description' => 'Equipes de 3',
            ],
            [
                'name' => 'Hockey',
                'description' => 'Equipes de 11',
            ]
        ]);
    }
}
