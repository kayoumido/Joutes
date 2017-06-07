<?php

use Illuminate\Database\Seeder;

class BadmintonTournamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


    	$db     = \Config::get('database.connections.mysql.database');
		$user   = \Config::get('database.connections.mysql.username');
		$pass   = \Config::get('database.connections.mysql.password');

		// running command line import in php code
		exec("mysql -u " . $user . " -p" . $pass . " -h ".\Config::get("database.connections.mysql.host")." " . $db . " < ".database_path("sqlFiles/badmintonTournament.sql"));

    	//DB::connection()->getPdo()->exec(file_get_contents(database_path("sqlFiles/badmintonTournament.sql")));
    	//DB::unprepared(file_get_contents('database/sqlFiles/badmintonTournament.sql'));
    }
}
