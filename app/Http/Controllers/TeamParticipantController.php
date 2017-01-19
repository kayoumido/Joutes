<?php

namespace App\Http\Controllers;
use App\Team;
use Illuminate\Http\Request;

class TeamParticipantController extends Controller
{

    public function destroy($idParticipant, $idTeam)
    {

        $team = Team::find($idTeam);
        $team->participants()->detach($idParticipant);

        return redirect()->route('teams.show', ['id' => $idTeam]);
    }

}
