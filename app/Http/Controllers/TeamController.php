<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Team;
use App\Tournament;
use App\Sport;

class TeamController extends Controller
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
            $teams       = [];

            foreach ($tournaments as $tournament) {
                $tournament_teams = $tournament->teams;

                foreach ($tournament_teams as $team) {

                    $team['sports'] = $team->sports();
                    $teams[]        = $team;
                }
            }

            return $teams;
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
     * @param  int  $event_id
     * @param  int  $team_id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $event_id, $team_id) {

        if ($request->is('api/*')) {
            $team        = Team::findOrFail($team_id);

            $team['sports'] = $team->sports();

            return $team;
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
