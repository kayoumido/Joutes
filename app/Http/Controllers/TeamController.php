<?php

namespace App\Http\Controllers;

use App\Team;
use App\Participant;
use Illuminate\Http\Request;
use App\Event;
use App\Team;
use App\Tournament;
use App\Sport;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event)
    {
        if ($request->is('api/*')) {

            $tournaments = Event::findOrFail($event)->tournaments;
            $teams       = [];

            foreach ($tournaments as $tournament) {
                $tournament_teams = $tournament->teams;

                foreach ($tournament_teams as $team) {

                    $team['sports'] = $team->sports();
                    $teams[]        = $team;
                }
            }

            return $teams;
        }
        else {
            return true;
        }
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
     * @param  int  $event_id
     * @param  int  $team_id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $event_id, $team_id) {

        if ($request->is('api/*')) {
            $team        = Team::findOrFail($team_id);

            $team['sports'] = $team->sports();

            return $team;
        }
        else {
            return true;
        }
        $team = Team::find($id); 

        $pepoleNoTeam = Participant::doesntHave('teams')->get();
        // Creation of the array will contain the datas of the dropdown list
        // This form: array("sport1" => "sport1", "sport2" => "sport2"), ...
        $dropdownList = array();
        for ($i=0; $i < sizeof($pepoleNoTeam); $i++) { 
            $dropdownList[$pepoleNoTeam[$i]->id] = $pepoleNoTeam[$i]->last_name . " " . $pepoleNoTeam[$i]->first_name; 
        }

   
        return view('team.show')->with('team', $team)->with('dropdownList', $dropdownList);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
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
