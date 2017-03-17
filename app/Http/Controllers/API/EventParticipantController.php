<?php

namespace App\Http\Controllers\API;

use App\Participant;
use App\Event;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;

class EventParticipantController extends Controller {
    use Helpers;

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param int $event_id
     * @return \Illuminate\Http\Response
     *
     * @author Doran Kayoumi
     */
    public function index(Request $request, $event_id) {

    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  int  $event_id
     * @param  int  $team_id
     * @return \Illuminate\Http\Response
     *
     * @author Doran Kayoumi
     */
    public function show(Request $request, $event_id, $team_id) {

    }
}
