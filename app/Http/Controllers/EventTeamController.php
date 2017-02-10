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
            $tournaments   = Event::findOrFail($event_id)->tournaments;
            $teams['teams'] = [];

            // loop through tournaments to get teams
            foreach ($tournaments as $tournament) {
                $tournament_teams = $tournament->teams;

                foreach ($tournament_teams as $team) {

                    $team['sports'] = $team->sports();

                    unset($team['pivot']);

                    array_push($teams['teams'], $team);
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
