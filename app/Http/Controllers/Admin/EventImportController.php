<?php

namespace App\Http\Controllers\Admin;

use \File;
use Carbon\Carbon;
use App\Tournament;
use App\Sport;
use App\Team;
use App\Participant;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventImportController extends Controller {
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @author Doran Kayoumi
     */
    public function index(Request $request, $event) {

        return view('import.index', array(
            'event_id' => $event
        ));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @author Doran Kayoumi
     */
    public function store(Request $request, $event) {
        // temporary path building
        $path = storage_path() . '/xml';

        $filenames = array(
            'participants' => array(
                'folder' => 'FichiersXML',
                'names'  => array(
                    'info_enseignants.xml',
                    'info_etudiants.xml',
                    'meca_enseignants.xml',
                    'meca_etudiants.xml',
                    'media_enseignants.xml',
                    'media_etudiants.xml'
                )
            ),
            'activities' => array(
                'folder' => 'FichiersXML',
                'names'  => array(
                    'Activites.xml'
                )
            ),
            'teams' => array(
                'folder' => 'Activites',
                'names'  => array(
                    'Equipes.xml',
                    'Participants.xml'
                )
            ),
        );

        // load participant files
        foreach ($filenames['participants']['names'] as $file) {

            $xml = (array)simplexml_load_string(File::get($path . '/' . $filenames['participants']['folder'] . '/' . $file));


            if (strpos($file, 'enseignants') !== false) {

                foreach ($xml['Teacher'] as $participant) {
                    $new_participant = array(
                        'id'         => (string)$participant->Id,
                        'first_name' => (string)$participant->Firstname,
                        'last_name'  => (string)$participant->Lastname,
                    );

                    if (!Participant::find($new_participant['id'])) {
                        Participant::create($new_participant);
                    }
                }

            }
            else if (strpos($file, 'etudiants') !== false) {

                foreach ($xml['CurrentStudent'] as $participant) {
                    $new_participant = array(
                        'id'         => (string)$participant->Id,
                        'first_name' => (string)$participant->Firstname,
                        'last_name'  => (string)$participant->Lastname,
                    );

                    if (!Participant::find($new_participant['id'])) {
                        Participant::create($new_participant);
                    }
                }

            }
        }

        // load activities file
        foreach ($filenames['activities']['names'] as $file) {
            $xml = (array)simplexml_load_string(File::get($path . '/' . $filenames['activities']['folder'] . '/' . $file));

            foreach ($xml['Activite'] as $activity) {
                // check if activity is found in sport table
                if (!Sport::where('name', (string)$activity->Nom)->exists()) {
                    // create new sport
                    $sport       = new Sport();
                    $sport->name = (string)$activity->Nom;
                    $sport->save();
                }
                else {
                    $sport = Sport::where('name', (string)$activity->Nom)->first();
                }

                // check if activity is found in Tournament table
                if (!Tournament::where('name', (string)$activity->Nom)->exists()) {
                    $tournament             = new Tournament();
                    $tournament->name       = (string)$activity->Nom;
                    $tournament->start_date = Carbon::now()->toDateTimeString();
                    $tournament->img        = '';
                    $tournament->event_id  = $event;
                    $tournament->sport_id  = $sport->id;
                    $tournament->save();
                }
            }
        }

        $activities = Tournament::all();
        // load team files
        foreach ($filenames['teams']['names'] as $file) {
            // loop through activities
            foreach ($activities as $activity) {
                // build path to current file
                $file_path = $path . '/' . $filenames['teams']['folder'] . '/' . $activity->name . '/' . $file;
                // check if file exists
                if (File::exists($file_path)) {
                    // load it
                    $xml = (array)simplexml_load_string(File::get($file_path));
                }
                else {
                    continue;
                }

                // check what file is used
                if ($file === 'Equipes.xml') {
                    // loop through teams
                    foreach ($xml['Equipe'] as $data) {

                        // check if team already exists
                        if (!Team::where('name', (string)$data->NomEquipe)->exists()) {
                            // create team
                            $team                 = new Team();
                            $team->name           = (string)$data->NomEquipe;
                            $team->tournament_id = $activity->id;
                            $team->save();
                        }
                        else {
                            // retrieve it from db
                            $team = Team::where('name', $data->NomEquipe)->first();
                        }
                        // loop threw team participants
                        foreach ($data->JoueurId as $member) {
                            // atach participant to team
                            $team->participants()->sync([
                                strval($member) => array ( 'isCaptain' => strval($member) == strval($data->Capitaine) )
                            ], false);
                        }
                    }
                }
                else if ($file === 'Participants.xml') {

                    // check if xml only contains one participant
                    if (!is_array($xml['JoueurId'])) {
                        // find participant in db
                        $participant = Participant::find($xml['JoueurId']);

                        // build team name
                        $teamname = $participant->first_name . ' ' . $participant->last_name;

                        // check if team already exists
                        if (!Team::where('name', $teamname)->exists()) {
                            // create it
                            $team = new Team();
                            $team->name = (string)$teamname;
                            $team->tournament_id = $activity->id;
                            $team->save();
                        }
                        else {
                            // retrieve it from db
                            $team = Team::where('name', $teamname)->first();
                        }

                        // atach participant to team if relation doesn't exist
                        $team->participants()->sync([
                            $participant->id => array ( 'isCaptain' => true )
                        ], false);
                    }
                    else if (is_array($xml['JoueurId'])) {
                        // loop through participants
                        foreach ($xml['JoueurId'] as $member) {

                            // find participant in db
                            $participant = Participant::find($member);

                            // build team name
                            $teamname = $participant->first_name . ' ' . $participant->last_name;

                            // check if team already exists
                            if (!Team::where('name', $teamname)->exists()) {
                                // create it
                                $team = new Team();
                                $team->name = $teamname;
                                $team->tournament_id = $activity->id;
                                $team->save();
                            }
                            else {
                                // retrieve it from db
                                $team = Team::where('name', $teamname)->first();
                            }
                            // atach participant to team if relation doesn't exist
                            $team->participants()->sync([
                                $participant->id => array ( 'isCaptain' => true)
                            ], false);
                        }
                    }

                }
            }
        }

        return redirect()->route('events.index');
    }
}
