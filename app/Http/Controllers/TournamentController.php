<?php

namespace App\Http\Controllers;

use App\Tournament; // This is the linked model
use App\Sport;
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
            'name' => 'required|min:3|max:40',
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
                $tournament->courts()->attach($court->id);
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
        $tournament = Tournament::find($id);
        $dropdownList = $this->getDropDownList();
        $sport = $tournament->courts[0]->sport;
        return view('tournament.edit')->with('tournament', $tournament)->with('dropdownList', $dropdownList)->with('sport', $sport);
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
            'name' => 'required|min:3|max:40',
            'sport' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails() || !empty($customErrors)) {
            $tournament = Tournament::find($id);
            $sport = $tournament->courts[0]->sport;
            $dropdownList = $this->getDropDownList();
            return view('tournament.edit')->with('dropdownList', $dropdownList)
                                          ->with('tournament', $tournament)
                                          ->with('sport', $sport)
                                          ->with('customErrors', $customErrors)
                                          ->withErrors($validator->errors());
        } else {
            //Save the tournament
            $tournament = Tournament::find($id);
            $tournament->name = $request->input('name');
            $tournament->start_date = $request->input('startDate');
            $tournament->end_date = $request->input('endDate');
            $tournament->start_time = $request->input('startTime');
            $tournament->fk_events = 1;
            $tournament->update();

            // Get the tournament's sport object
            $sport = Sport::find($request->input('sport'));
            // Get all courts linked (Obligatory because the user can only choose a sport who have one or more courts linked)
            $courtsOfSport = $sport->courts;

            // Get all courts linked to the current tournament
            $courtsOfTournament = $tournament->courts;

            // We delete all entries of the current tournament on the intermediate table
            foreach ($courtsOfTournament as $courtOfTournament) {
                $tournament->courts()->detach($courtOfTournament->id);
            }

            // We add the good entries with good courts changed 
            foreach ($courtsOfSport as $courtOfSport) {
                $tournament->courts()->attach($courtOfSport->id);
            }

            return redirect()->route('tournaments.index');
        }
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
