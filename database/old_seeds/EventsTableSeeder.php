<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('events')->insert([
            [
                'name' => 'Joutes 2016',
            ],
            [
                'name' => 'Joutes 2018',
            ]
        ]);
    }
}
