<?php


use Illuminate\Database\Seeder;

class courtsTableSeeder extends Seeder
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
                'sports_id' => 1,
                'name' => "Terrain A",
            ],
            [
                'sports_id' => 1,
                'name' => "Terrain 1",
            ],
            [
                'sports_id' => 2,
                'name' => "Terrain B",
            ],
            [
                'sports_id' => 2,
                'name' => "Terrain 2",
            ],
            [
                'sports_id' => 3,
                'name' => "Terrain C",
            ],
            [
                'sports_id' => 3,
                'name' => "Terrain 3",
            ],
            [
                'sports_id' => 4,
                'name' => "Terrain D",
            ],
            [
                'sports_id' => 4,
                'name' => "Terrain 4",
            ],
            [
                'sports_id' => 5,
                'name' => "Terrain E",
            ],
            [
                'sports_id' => 5,
                'name' => "Terrain 5",
            ],
            [
                'sports_id' => 6,
                'name' => "Terrain F",
            ],
            [
                'sports_id' => 6,
                'name' => "Terrain 6",
            ],
            [
                'sports_id' => 7,
                'name' => "Terrain G",
            ],
            [
                'sports_id' => 7,
                'name' => "Terrain 7",
            ],
            [
                'sports_id' => 8,
                'name' => "Terrain H",
            ],
            [
                'sports_id' => 8,
                'name' => "Terrain 8",
            ],
            [
                'sports_id' => 9,
                'name' => "Terrain I",
            ],
            [
                'sports_id' => 9,
                'name' => "Terrain 9",
            ],
            [
                'sports_id' => 10,
                'name' => "Terrain J",
            ],
            [
                'sports_id' => 10,
                'name' => "Terrain 10",
            ]
        ]);

    }
}
