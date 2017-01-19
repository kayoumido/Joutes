<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Tournament;
use App\Event;
use App\Sport;

class TournamentController extends Controller
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
        else {
            return true;
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $event, $tournament_id)
    {
        if ($request->is('api/*')) {
            
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
        else {
            return true;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
