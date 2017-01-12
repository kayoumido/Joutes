<?php

use Illuminate\Database\Seeder;

class CourtsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courts')->insert([
            [
                'name'      => 'Court 1',
                'fk_sports' => 7,
            ],
            [
                'name'      => 'Court 2',
                'fk_sports' => 8,
            ],
            [
                'name'      => 'Gym B',
                'fk_sports' => 9,
            ],
            [
                'name'      => 'Gym Z',
                'fk_sports' => 10,
            ]
        ]);
    }
}
