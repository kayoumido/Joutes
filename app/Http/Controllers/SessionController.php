<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SessionController extends Controller
{

    /**
     * Show the login form
     *
     * @return \Illuminate\Http\Response
     *
     * @author Dessaules Loïc
     */
    public function index() // I used index method and no create to have joutes/login and no joutes/login/create
    {   
        return view('session.create');
    }

    /**
     * Connect the user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @author Dessaules Loïc
     */
    public function store(Request $request)
    {
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            return "accepted::".url()->previous();
        }else{
            $error = "Nom d'utilisateur ou mot de passe incorrect";
            return "refused::".$error;
        }
    }

    /**
     * Disconnected the current connected user
     *
     * @param  int  $id (Not important for the disconnected method ... I have to put an id param because I use the laravel resources)
     *
     * @return \Illuminate\Http\Response
     *
     * @author Dessaules Loïc
     */
    public function destroy($id)
    {
        Auth::logout();
        return redirect(route('events.index'));
    }

}
