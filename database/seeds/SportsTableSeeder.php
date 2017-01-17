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
                'description' => null,
            ],
            [
                'name' => 'Volley',
                'description' => null,
            ],
            [
                'name' => 'Hockey',
                'description' => 'Equipes de 11',
            ]
        ]);
    }
}
