<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tournament;
use App\Event;
use App\Sport;

class EventTournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $event)
    {
        if ($request->is('api/*')) {
            $tournaments = Event::findOrFail($event)->tournaments;

            // for ($i = 0; $i < count($tournaments); ++$i) {
            foreach ($tournaments as $tournament) {

                $court_names = [];
                $sport       = '';

                $courts = Tournament::findOrFail($tournament->id)->courts;

                foreach ($courts as $court) {
                    $court_names[] = $court->name;
                    $sport         = Sport::findOrFail($court->fk_sports);
                }

                // adding found sport and courts to tournaments array.
                // This is done because, these informations aren't found when getting info from tournament.
                $tournament['sport']  = $sport->name;
                $tournament['courts'] = $court_names;
            }

            return $tournaments;
        }

        return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $event_id, $tournament_id)
    {
        if ($request->is('api/*')) {

            // try and find event
            Event::findOrFail($event_id);

            $court_names = [];
            $sport       = '';
            $team_names  = [];

            $tournament = Tournament::findOrFail($tournament_id);

            $courts = Tournament::findOrFail($tournament_id)->courts;
            $teams  = Tournament::findOrFail($tournament_id)->teams;

            foreach ($courts as $court) {
                $court_names[] = $court->name;
                $sport         = Sport::findOrFail($court->fk_sports);
            }

            foreach ($teams as $team) {
                $team_names[] = $team->name;
            }

            // adding found sport and courts to tournaments array.
            // This is done because, these informations aren't found when getting info from tournament.
            $tournament['sport']  = $sport->name;
            $tournament['courts'] = $court_names;
            $tournament['teams']  = $team_names;

            return $tournament;
        }

        return true;
    }
}
