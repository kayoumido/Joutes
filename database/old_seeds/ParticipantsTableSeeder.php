<?php

use Illuminate\Database\Seeder;

class ParticipantsTableSeeder extends Seeder
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
                'first_name' => 'Loïc',
                'last_name' => 'Dessaules',
            ],
            [
                'first_name' => 'Antoine',
                'last_name' => 'Dessauges',
            ],
            [
                'first_name' => 'Doran',
                'last_name' => 'Kayoumi',
            ],
            [
                'first_name' => 'Struan',
                'last_name' => 'Forsyth',
            ]
        ]);
    }
}
