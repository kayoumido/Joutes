<?php

namespace App\Http\Controllers;

use \File;
use App\Tournament;
use App\Participant;
use Illuminate\Http\Request;

class ImportController extends Controller {
    /**
     * @return \Illuminate\Http\Response
     *
     * @author Doran Kayoumi
     */
    public function index() {
        /*
        return view('import.index');
        */
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @author Doran Kayoumi
     */
    public function store(Request $request) {

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

        $participants = array();
        // load participant files
        foreach ($filenames['participants']['names'] as $file) {

            $xml = (array)simplexml_load_string(File::get($path . '/' . $filenames['participants']['folder'] . '/' . $file));


            if (strpos($file, 'enseignants') !== false) {

                foreach ($xml['Teacher'] as $participant) {
                    $participants[(string)$participant->Id] = array(
                        'id'        => (string)$participant->Id,
                        'first_name' => (string)$participant->Firstname,
                        'last_name'  => (string)$participant->Lastname,
                    );
                }

            }
            else if (strpos($file, 'etudiants') !== false) {

                foreach ($xml['CurrentStudent'] as $participant) {
                    $participants[(string)$participant->Id] = array(
                        'id'        => (string)$participant->Id,
                        'first_name' => (string)$participant->Firstname,
                        'last_name'  => (string)$participant->Lastname,
                    );
                }

            }
        }

        $activities = array();
        // load activities file
        foreach ($filenames['activities']['names'] as $file) {
            $xml = (array)simplexml_load_string(File::get($path . '/' . $filenames['activities']['folder'] . '/' . $file));

            foreach ($xml['Activite'] as $activity) {
                $activities[] = (string)$activity->Nom;
            }
        }

        $teams = array();
        // load team files
        foreach ($filenames['teams']['names'] as $file) {
            // loop through activities
            foreach ($activities as $activity) {
                // build path to current file
                $file_path = $path . '/' . $filenames['teams']['folder'] . '/' . $activity . '/' . $file;
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
                    foreach ($xml['Equipe'] as $team) {

                        $members = array();
                        foreach ($team->JoueurId as $member) {
                            $members[] = (string)$member;
                        }
                        $teams[] = array(
                            'name'    => (string)$team->NomEquipe,
                            'captain' => (string)$team->Capitaine,
                            'members' => $members
                        );
                    }
                }
                else if ($file === 'Participants.xml') {

                    if (!is_array($xml['JoueurId'])) {

                        $participant = $participants[(string)$xml['JoueurId']];

                        $teams[] = array(
                            'name'    => $participant['firstname'] . ' ' . $participant['lastname'],
                            'captain' => $xml['JoueurId'],
                            'members' => array($xml['JoueurId'])
                        );
                    }
                    else {
                        foreach ($xml['JoueurId'] as $member) {

                            $participant = $participants[(string)$member];

                            $teams[] = array(
                                'name'    => $participant['firstname'] . ' ' . $participant['lastname'],
                                'captain' => $member,
                                'members' => array($member)
                            );
                        }
                    }
                }
            }
        }

        // dd($participants);

        // Tournament::create();

        foreach ($participants as $participant) {

            if (!Participant::find($participant['id'])) {
                Participant::create($participant);
            }
        }

        return 'true';
    }
}
