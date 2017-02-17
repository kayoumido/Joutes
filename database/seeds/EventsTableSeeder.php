<?php

use Illuminate\Database\Seeder;

class eventsTableSeeder extends Seeder
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
                'name' => "Joute 2014",
                'img' => "20120611_114612",
            ],
            [
                'name' => "Joute 2015",
                'img' => "20090611_114532",
            ],
            [
                'name' => "Joute 2016",
                'img' => "20120605_114532",
            ]
        ]);
    }
}
