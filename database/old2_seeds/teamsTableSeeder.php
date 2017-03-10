<?php

use Illuminate\Database\Seeder;

class teamsTableSeeder extends Seeder
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
                'name' => "SI-T1A",
                'tournaments_id' => 1,
            ],
            [
                'name' => "SI-T2A",
                'tournaments_id' => 1,
            ],
            [
                'name' => "CIN4B",
                'tournaments_id' => 1,
            ],
            [
                'name' => "FPA",
                'tournaments_id' => 1,
            ],
            [
                'name' => "CFC4",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Media",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Meca",
                'tournaments_id' => 1,
            ],
            [
                'name' => "CIN3A",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Electro",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Yverdon",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Sainte-Croix",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Payerne",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Lausanne",
                'tournaments_id' => 1,
            ],
            [
                'name' => "ETML",
                'tournaments_id' => 1,
            ],
            [
                'name' => "TecDev",
                'tournaments_id' => 1,
            ],
            [
                'name' => "TecSys",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Auto",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Poly",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Anciens élèves",
                'tournaments_id' => 1,
            ],
            [
                'name' => "PreAp",
                'tournaments_id' => 1,
            ],
            [
                'name' => "CFC1",
                'tournaments_id' => 1,
            ],
            [
                'name' => "CFC2",
                'tournaments_id' => 1,
            ],
            [
                'name' => "CFC3",
                'tournaments_id' => 1,
            ],
            [
                'name' => "FPA2",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Stagiaires",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Media2",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Poly2",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Media3",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Prof2",
                'tournaments_id' => 1,
            ],
            [
                'name' => "PreAp2",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Meca2",
                'tournaments_id' => 1,
            ],
            [
                'name' => "Media3",
                'tournaments_id' => 1,
            ],
        ]);
    }
}
