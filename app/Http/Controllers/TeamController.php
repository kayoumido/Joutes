<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams = Team::all();
        return view('team.index')->with('teams', $teams);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $team = Team::whereId($id)->first();
        return view('team.show')->with('team', $team);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::whereId($id)->first();
        return view('team.edit')->with('team', $team);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $team = Team::find($id);
        $error = null;

        // Test: must be begin with 3caracter min. (all sports have minimum 3 caracters)
        $pattern = '/^[a-zA-Z]{3}/';

        // Check if name is empty OR has minimum 3 caracter at the beginning
        if(empty($request->input('name')) || !preg_match($pattern, $request->input('name'))){
            $error = 'Nom de team invalide, 3 caractères minimum';
        }
        // Check if the name already exists 
        else if(Team::where('name', '=', $request->input('name'))->exists()){
            $error = '"'.$request->input('name').'"'.' existe déjà';
        }
            
        if(empty($error)){
            $team->update($request->all());
            return redirect()->route('teams.index');
        }else{
            return view('team.edit')->with('error', $error)->with('team', $team);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $team = Team::find($id);
        $team->delete();
        return redirect()->route('teams.index');
    }
}
