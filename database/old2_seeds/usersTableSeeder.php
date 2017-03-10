<?php

use Illuminate\Database\Seeder;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => "admin",
                'password' => '$2y$10$MR3E4eGshzS3NO/2ueVQcuZt9Li4nGJ8fBBI8FUWZVqxNsv4DzgVS',
            ]
        ]);
    }
}
