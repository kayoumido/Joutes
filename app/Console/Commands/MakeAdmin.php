<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class MakeAdmin extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin {username} {password}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new administrator';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $username = $this->argument('username');
        $password = bcrypt($this->argument('password'));

        if(User::where('name', '=', $username)->exists()){
            $this->line("Erreur: L'utilisateur $username existe déjà.");
        }else{
            $user = new User;
            $user->name = $username;
            $user->password = $password;
            $user->save();
        }

    }
}
