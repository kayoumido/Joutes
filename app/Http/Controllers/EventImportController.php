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

    }
}
