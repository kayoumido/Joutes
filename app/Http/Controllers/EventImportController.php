<?php

namespace App\Http\Controllers;

use \File;
use App\Tournament;
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

        foreach ($participants as $participant) {

            if (!Participant::find($participant['id'])) {
                Participant::create($participant);
            }
        }
    }
}
