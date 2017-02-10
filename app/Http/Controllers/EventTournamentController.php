<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;
use App\Event;
use App\Sport;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EventTournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request  $request
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

            // loop through tournaments to get courts and sport
            foreach ($tournaments as $tournament) {

                $court_names = [];
                $sport       = '';

                // get tournament courts
                $courts = Tournament::findOrFail($tournament->id)->courts;

                foreach ($courts as $court) {
                    $court_names[] = $court->name;
                    $sport         = Sport::findOrFail($court->fk_sports);
                }

                // adding found sport and courts to tournaments array.
                // This is done because, these informations aren't found when getting info from tournament.
                $tournament['sport']  = $sport->name;
                $tournament['courts'] = $court_names;

                // remove unwanted elements from array
                unset($tournament['start_date']);
                unset($tournament['end_date']);
                unset($tournament['start_time']);
                unset($tournament['end_time']);
                unset($tournament['fk_events']);
            }

            return $tournaments;
        }


        $tournaments = Event::findOrFail($event_id)->tournaments;
        return view('tournament.index')->with('tournaments', $tournaments);
    
    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request  $request
     * @param  int  $event_id
     * @param  int  $tournament_id
     * @return \Illuminate\Http\Response
     *
     * @author Doran Kayoumi
     */
    public function show(Request $request, $event_id, $tournament_id) {
        // check is it's an api request
        if ($request->is('api/*')) {

            // get event and event tournaments
            $event       = Event::findOrFail($event_id);
            $tournament  = $event->tournament($tournament_id);
            $court_names = [];
            $sport       = '';
            $team_names  = [];

            // check if tournament belongs to event
            if (empty($tournament)) {
                // error
                throw new NotFoundHttpException("Tournament " . $tournament_id . " doesn't belong to Event " . $event_id);
            }

            // get tournament courts and teams
            $courts = Tournament::findOrFail($tournament_id)->courts;
            $teams  = Tournament::findOrFail($tournament_id)->teams;

            // get tournament courts and sport
            foreach ($courts as $court) {
                $court_names[] = $court->name;
                $sport         = Sport::findOrFail($court->fk_sports);
            }

            // get tournament teams
            foreach ($teams as $team) {
                $team_names[] = $team->name;
            }

            // adding found sport and courts to tournaments array.
            // This is done because, these informations aren't found when getting info from tournament.
            $tournament['sport']        = empty($sport) ? "No sports" : $sport->name;
            $tournament['courts']       = $court_names;
            $tournament['teams']        = $team_names;
            // Theses elements are added to array and set to nothing because they aren't managed yet.
            $tournament['group_matchs'] = null;
            $tournament['winner']       = null;

            // remove unwanted elements from array
            unset($tournament['start_date']);
            unset($tournament['end_date']);
            unset($tournament['start_time']);
            unset($tournament['end_time']);
            unset($tournament['fk_events']);

            return $tournament;
        }

        return true;
    }
}
