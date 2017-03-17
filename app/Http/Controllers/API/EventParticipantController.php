<?php

namespace App\Http\Controllers\API;

use App\Event;
use App\Participant;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Response\Transformers\ParticipantTransformer;

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

        // get event teams
        $participants = Event::findOrFail($event_id)->participants();

        return $this->response->collection($participants, new ParticipantTransformer);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param  int  $event_id
     * @param  int  $participant_id
     * @return \Illuminate\Http\Response
     *
     * @author Doran Kayoumi
     */
    public function show(Request $request, $event_id, $participant_id) {

    }
}
