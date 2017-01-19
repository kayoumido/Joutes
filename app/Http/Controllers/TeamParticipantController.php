<?php

namespace App\Http\Controllers;
use App\Team;
use URL;

use Illuminate\Http\Request;

class TeamParticipantController extends Controller
{

    public function destroy($idParticipant, $idTeam)
    {
        $team = Team::find($idTeam);
        $team->participants()->detach($idParticipant);

        if (URL::previous() === URL::route('teams.show', ['id' => $idTeam])) 
            return redirect()->route('teams.show', ['id' => $idTeam]);
        else
            return redirect()->route('participants.show', ['id' => $idParticipant]);
    }

     public function store(Request $request, $idTeam)
    {
		$idParticipant = $request->input('pepole'); 
        $team = Team::find($idTeam);
        $team->participants()->attach($idParticipant);
        
       return redirect()->route('teams.show', ['id' => $idTeam]);
    }

}
