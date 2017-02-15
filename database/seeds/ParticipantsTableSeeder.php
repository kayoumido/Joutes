<?php

use Illuminate\Database\Seeder;

class participantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('participants')->insert([
            [
                'first_name' => "Antoine",
                'last_name' => "Dessauges",
            ],
            [
                'first_name' => "Loïc",
                'last_name' => "Dessaules",
            ],
            [
                'first_name' => "Doran",
                'last_name' => "Kayoumi",
            ],
            [
                'first_name' => "Manou",
                'last_name' => "Falcy",
            ],
            [
                'first_name' => "Struan",
                'last_name' => "Forysth",
            ],
            [
                'first_name' => "Thomas",
                'last_name' => "Ricci",
            ],
            [
                'first_name' => "Thomas",
                'last_name' => "Marcoup",
            ],
            [
                'first_name' => "Eric",
                'last_name' => "Bousba",
            ],
            [
                'first_name' => "Esteban",
                'last_name' => "Sotilio",
            ],
            [
                'first_name' => "Dinesh",
                'last_name' => "Dinnembourg",
            ],
            [
                'first_name' => "Lucas",
                'last_name' => "Gonzales",
            ],
            [
                'first_name' => "Ludovic",
                'last_name' => "Barraud",
            ],
            [
                'first_name' => "Doran",
                'last_name' => "Kayoumi",
            ],
            [
                'first_name' => "Eva",
                'last_name' => "Di Massa",
            ],
            [
                'first_name' => "Océane",
                'last_name' => "Gumy",
            ],
            [
                'first_name' => "Thomas",
                'last_name' => "Bop",
            ],
            [
                'first_name' => "Nenad",
                'last_name' => "Rajic",
            ],
            [
                'first_name' => "Arnaud",
                'last_name' => "Brodmann",
            ],
            [
                'first_name' => "Artan",
                'last_name' => "Alimi",
            ],
            [
                'first_name' => "John",
                'last_name' => "Doe",
            ]
        ]);
    }
}
