<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Team;
use App\Event;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EventTeamController extends Controller
{
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
            $tournaments = Event::findOrFail($event_id)->tournaments;
            $teams       = [];

            // loop through tournaments to get teams
            foreach ($tournaments as $tournament) {
                $tournament_teams = $tournament->teams;

                foreach ($tournament_teams as $team) {

                    $team['sports'] = $team->sports();
                    $teams[]        = $team;
                }
            }

            return $teams;
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
            $team['sports'] = $team->sports();

            return $team;
        }
    }
}
