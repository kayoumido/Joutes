<?php

use Illuminate\Database\Seeder;

class sportsTableSeeder extends Seeder
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
                'name' => "Football",
                'description' => "Par équipe de 11",
            ],
            [
                'name' => "Volley",
                'description' => "",
            ],
            [
                'name' => "Tennis",
                'description' => "Simple ou double",
            ],
            [
                'name' => "Badminton",
                'description' => "",
            ],
            [
                'name' => "Basketball",
                'description' => "",
            ],
            [
                'name' => "Rugby",
                'description' => "",
            ],
            [
                'name' => "Judo",
                'description' => "Individuel",
            ],
            [
                'name' => "Beachvolley",
                'description' => "",
            ],
            [
                'name' => "Unihockey",
                'description' => "Par équipe de 5",
            ],
            [
                'name' => "Petanque",
                'description' => "",
            ]
        ]);
    }
}
