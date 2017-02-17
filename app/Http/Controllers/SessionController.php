<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SessionController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() // I used index method and no create to have joutes/login and no joutes/login/create
    {   
        return view('session.create');
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
            return redirect(route('events.index')); 
            
        }
        return Redirect::back();
    }

    /**
     * Disconnected the current connected user
     *
     * @return \Illuminate\Http\Response
     *
     * @author Dessaules Loïc
     */
    public function destroy($id)
    {
        Auth::logout();
        return Redirect::back();
    }

}
