<?php

namespace App\Http\Controllers;
use App\Team;
use App\Participant;
use Cookie;
use URL;

use Illuminate\Http\Request;

class TeamParticipantController extends Controller
{

    public function destroy($idParticipant, $idTeam)
    {
        $team = Team::find($idTeam);

        $participant = Participant::find($idParticipant);
        $participantName = $participant->first_name. " " .$participant->last_name;

        $team->participants()->detach($idParticipant);

        if (URL::previous() === URL::route('teams.show', ['id' => $idTeam])){

            $infosMessage = 'Le participant "'. $participantName .'" à bien été supprimer de la team "'. $team->name .'" !';
            Cookie::queue('infos', $infosMessage, 1);

            return redirect()->route('teams.show', ['id' => $idTeam]);
        }
        else{

            $infosMessage = 'Le participant "'. $participantName .'" à bien été supprimer de la team "'. $team->name .'" !';
            Cookie::queue('infos', $infosMessage, 1);

            return redirect()->route('participants.show', ['id' => $idParticipant]);
        }
    }

     public function store(Request $request, $id)
    {

        
        if (URL::previous() === URL::route('teams.show', ['id' => $id])){

            $idParticipant = $request->input('pepole'); 
            $team = Team::find($id);
            $team->participants()->attach($idParticipant);

            $participant = Participant::find($idParticipant);
            $participantName = $participant->first_name. " " .$participant->last_name;

            $infosMessage = 'Le participant "'. $participantName .'" à bien été ajouté à la team "'. $team->name .'" !';
            Cookie::queue('infos', $infosMessage, 1);

            return redirect()->route('teams.show', ['id' => $id]);
        }
        else{

            $idTeam= $request->input('team'); 
            $team = Team::find($idTeam);
            $team->participants()->attach($id);

            $participant = Participant::find($id);
            $participantName = $participant->first_name. " " .$participant->last_name;

            $infosMessage = 'Le participant "'. $participantName .'" à bien été ajouté à la team "'. $team->name .'" !';
            Cookie::queue('infos', $infosMessage, 1);

            return redirect()->route('participants.show', ['id' => $id]);
        }

    }

}
