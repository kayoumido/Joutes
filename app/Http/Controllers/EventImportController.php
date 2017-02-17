<?php

namespace App\Http\Controllers;

use \File;
use Carbon\Carbon;
use App\Tournament;
use App\Sport;
use App\Team;
use App\Participant;
use Illuminate\Http\Request;

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
                if (!Sport::find((string)$activity->Nom)) {
                    $sport       = new Sport();
                    $sport->name = (string)$activity->Nom;
                    $sport->save();
                }
                else {
                    $sport = Sport::find((string)$activity->Nom);
                }

                // check if activity is found in Tournament table
                if (!Tournament::find((string)$activity->Nom)) {
                    $tournament             = new Tournament();
                    $tournament->name       = (string)$activity->Nom;
                    $tournament->start_date = Carbon::now()->toDateTimeString();
                    $tournament->end_date   = Carbon::now()->toDateTimeString(); // temp
                    $tournament->start_time = date("H:i"); // temp
                    $tournament->end_time   = date("H:i"); // temp
                    $tournament->fk_events  = $event;
                    //$tournament->fk_sports  = $sport->id;
                    $tournament->save();
                }
            }
        }

        $activities = Tournament::all();
        //dd($activities[0]->name);
        // load team files
        foreach ($filenames['teams']['names'] as $file) {
            // loop through activities
            foreach ($activities as $activity) {
                // build path to current file
                $file_path = $path . '/' . $filenames['teams']['folder'] . '/' . $activity->name . '/' . $file;
                // check if file exists
                if (File::exists($file_path)) {
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
                        if (!Team::where('name', $data->NomEquipe)->exists()) {

                            // create team
                            $team = new Team();
                            $team->name = (string)$data->NomEquipe;
                            $team->save();
                        }
                        else {

                            $team = Team::where('name', $data->NomEquipe)->first();
                            //dd($team->name);
                            // get it from db
                        }

                        $members = array();
                        foreach ($data->JoueurId as $member) {
                            $team->participants()->attach($member);
                            //$members[] = (string)$member;
                        }

                        // $teams[] = array(
                        //     'name'    => (string)$team->NomEquipe,
                        //     'captain' => (string)$team->Capitaine,
                        //     'members' => $members
                        // );
                    }
                }
                else if ($file === 'Participants.xml') {

                    // if (!is_array($xml['JoueurId'])) {
                    //
                    //     // find participant in db
                    //     $participant = Participant::find($xml['JoueurId']);
                    //
                    //     // build team name
                    //     $teamname = $participant->first_name . ' ' . $participant->last_name;
                    //
                    //     // check if team already exists
                    //     if (!Team::find($teamname)) {
                    //         // create it
                    //         $team = new Team();
                    //         $team->name = $teamname;
                    //         $team->save();
                    //     }
                    //     else {
                    //         // get it from db
                    //         $team = Team::find($teamname);
                    //     }
                    //
                    //     $team->participants()->attach($participant->id);
                    //
                    //     // $participant = $participants[(string)$xml['JoueurId']];
                    //
                    //     // $teams[] = array(
                    //     //     'name'    => $participant['firstname'] . ' ' . $participant['lastname'],
                    //     //     'captain' => $xml['JoueurId'],
                    //     //     'members' => array($xml['JoueurId'])
                    //     // );
                    // }
                    // else {
                    //     foreach ($xml['JoueurId'] as $member) {
                    //
                    //         // find participant in db
                    //         $participant = Participant::find($member);
                    //
                    //         // build team name
                    //         $teamname = $participant->first_name . ' ' . $participant->last_name;
                    //
                    //         // check if team already exists
                    //         if (!Team::find($teamname)) {
                    //             // create it
                    //             $team = new Team();
                    //             $team->name = $teamname;
                    //             $team->save();
                    //         }
                    //         else {
                    //             // get it from db
                    //             $team = Team::find($teamname);
                    //         }
                    //
                    //         $team->participants()->attach($participant->id);
                    //
                    //         // $teams[] = array(
                    //         //     'name'    => $participant['firstname'] . ' ' . $participant['lastname'],
                    //         //     'captain' => $member,
                    //         //     'members' => array($member)
                    //         // );
                    //     }
                    // }
                }
            }
        }
    }
}
