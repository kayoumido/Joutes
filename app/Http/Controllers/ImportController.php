<?php

namespace App\Http\Controllers;

use \File;
use Illuminate\Http\Request;

class ImportController extends Controller {
    /**
     * @return \Illuminate\Http\Response
     *
     * @author Doran Kayoumi
     */
    public function index() {
        return view('import.index');
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
                    'Equipes.xml'
                )
            ),
        );

        $participants = array();
        // load participant files
        foreach ($filenames['participants']['names'] as $file) {

            $xml = (array)simplexml_load_string(File::get($path . '/' . $filenames['participants']['folder'] . '/' . $file));


            if (strpos($file, 'enseignants') !== false) {

                foreach ($xml['Teacher'] as $participant) {
                    $participants[] = array(
                        'id'        => (string)$participant->Id,
                        'firstname' => (string)$participant->Firstname,
                        'lastname'  => (string)$participant->Lastname,
                    );
                }

            }
            else if (strpos($file, 'etudiants') !== false) {

                foreach ($xml['CurrentStudent'] as $participant) {
                    $participants[] = array(
                        'id'        => (string)$participant->Id,
                        'firstname' => (string)$participant->Firstname,
                        'lastname'  => (string)$participant->Lastname,
                    );
                }

            }
        }

        dd($participants);

        return $path;
    }
}
