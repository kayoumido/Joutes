<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // I used index method and no create to have joutes/login and no joutes/login/create
    {   
        $connected = false;
        if(Auth::check()){
            $connected = true;
        }
        return view('session.create')->with('connected', $connected);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::attempt(['username' => $request->input('username'), 'password' => $request->input('password')])) {
            // Authentication passed...
        }
        return redirect(route('login.index')); 
    }

    /**
     * Disconnected the current connected user
     *
     * @return \Illuminate\Http\Response
     *
     * @author Dessaules Loïc
     */
    public function destroy($id = 0)
    {
        Auth::logout();
        return redirect()->route('login.index');
    }

}
