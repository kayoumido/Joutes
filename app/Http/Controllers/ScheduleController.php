<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller {

    public function index($tournament) {

        return view('schedule.index', array(
            'tournament_id' => $tournament
        ));
    }
}
