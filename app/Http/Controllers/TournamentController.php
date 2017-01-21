<?php

namespace App\Http\Controllers;

use App\Tournament; // This is the linked model
use App\Sport;
use App\Tournaments_has_courts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TournamentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tournaments = Tournament::all();
        return view('tournament.index')->with('tournaments', $tournaments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dropdownList = $this->getDropDownList();
        return view('tournament.create')->with('dropdownList', $dropdownList);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* CUSTOM SPECIFIC VALIDATION */
        $customErrors = array();

        $patternTime =  '/^([01]\d|2[0-3]):?([0-5]\d)$/';
        $patternDate = '/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/';
        // The time must be HH:MM
        if(!preg_match($patternTime, $request->input('startTime'))){
            $customErrors[] =  "Le champ Heure de début doit être sous la forme : hh:mm.";
        }
        // The date must be jj:mm:YYYY (laravel cast in YYYY-jj-mm)
        if(!preg_match($patternDate, $request->input('startDate'))){
            $customErrors[] = "Le champ Date de début doit être sous la forme : jj.mm.YYYY.";
        }
        if(!preg_match($patternDate, $request->input('endDate'))){
            $customErrors[] = "Le champ Date de fin doit être sous la forme : jj.mm.YYYY.";
        }


        /* LARAVEL VALIDATION */
        // create the validation rules
        $rules = array(
            'name' => 'required|min:3|max:20',
            'sport' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails() || !empty($customErrors)) {
            $dropdownList = $this->getDropDownList();
            return view('tournament.create')->with('dropdownList', $dropdownList)->withErrors($validator->errors())->with('customErrors', $customErrors);
        } else {
            //Save the tournament
            $tournament = new Tournament;
            $tournament->name = $request->input('name');
            $tournament->start_date = $request->input('startDate');
            $tournament->end_date = $request->input('endDate');
            $tournament->start_time = $request->input('startTime');
            $tournament->fk_events = 1;
            $tournament->save();

            // Get the tournament's sport object
            $sport = Sport::find($request->input('sport'));
            // Get all courts linked (Obligatory because the user can only choose a sport who have one or more courts linked)
            $courts = $sport->courts;
            // Put the FK values on the intermediate table
            foreach ($courts as $court) {
                $tournamentHasCourt = new Tournaments_has_courts;
                $tournamentHasCourt->fk_tournaments = $tournament->id;
                $tournamentHasCourt->fk_courts = $court->id;
                $tournamentHasCourt->save();
            }
            return redirect()->route('tournaments.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tournament = Tournament::find($id);
        return view('tournament.show')->with('tournament', $tournament);
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
        $tournament = Tournament::findOrFail($id);
        $tournament->delete();
        return redirect()->route('tournaments.index');
    }


    // The dropdown contains ONLY sports who have one or more courts linked
    private function getDropDownList(){
        $sports = Sport::all();
        // Creation of the array will contain the datas of the dropdown list
        // This form: array("sport_id 1" => "sport_name 1", "sport_id 2" => "sport_name 2"), ...
        $dropdownList = array();
        for ($i=0; $i < sizeof($sports); $i++) { 
            // We keep only the sport who have one or more courts linked
            if(isset($sports[$i]->courts[0])){
                $dropdownList[$sports[$i]->id] = $sports[$i]->name; 
            }
        }
        return $dropdownList;
    }

}
