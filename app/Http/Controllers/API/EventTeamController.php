<?php

namespace App\Http\Controllers\API;

use App\Team;
use App\Event;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Response\Transformers\TeamTransformer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


class EventTeamController extends Controller
{
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
        // check is it's an api request
        if ($request->is('api/*')) {

            // get event tournaments
            $teams = Event::findOrFail($event_id)->teams;

            return $this->response->collection($teams, new TeamTransformer, ['key' => 'teams']);
        }
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

        // check is it's an api request
        if ($request->is('api/*')) {

            // find event and team with given ids
            $event = Event::findOrFail($event_id);
            $team  = Team::findOrFail($team_id);

            // check if team is in event
            if (!$event->team($team_id)) {
                throw new NotFoundHttpException("Team " . $team_id . " doesn't belong to Event " . $event_id);
            }

            // get team sports
            $team['sports']       = $team->sports();
            $team['tournaments']  = $team->tournaments;
            $team['participants'] = $team->participants;
            $team['status']       = null;
            $team['match']        = null;

            // remove unwanted elements from tournament
            foreach ($team['tournaments'] as $tournament) {
                unset($tournament['start_date']);
                unset($tournament['end_date']);
                unset($tournament['start_time']);
                unset($tournament['end_time']);
                unset($tournament['fk_events']);
                unset($tournament['pivot']);
            }
            // remove unwanted elements from participants
            foreach ($team['participants'] as $participant) {
                unset($participant['pivot']);
            }

            return $team;
        }
    }
}
