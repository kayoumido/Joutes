<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller {

    public function index() {

        $schedule  = json_decode($this->api->get('schedule'));

        return view('schedule.index', array(
            'schedule' => $schedule
        ));
    }
}
