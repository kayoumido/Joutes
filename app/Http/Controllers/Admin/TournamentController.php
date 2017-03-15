<?php
/*
15.03.2017
TODO : 
  - We cannot have same tournament's name with the same sport
  - Create - update views, we can only choose teams who don't are on any tournament. (and the current tournament's team)
*/
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Tournament;
use App\Sport;
use App\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TournamentController extends Controller
{
    /**
     * Show the form for creating a new tournament.
     *
     * @return \Illuminate\Http\Response
     *
     * @author Dessaules Loïc
     */
    public function create()
    {
        $dropdownListSports = $this->getDropDownListSports();
        $dropdownListTeams = $this->getDropDownListTeams();
        return view('tournament.create')->with('dropdownListSports', $dropdownListSports)->with('dropdownListTeams', $dropdownListTeams);
    }

    /**
     * Store a newly created tournament in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     *
     * @author Dessaules Loïc
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

        // Check if the name of the new tournaments and his sport is already linked in the DB
        // example : Tournament 1 -> Football // I cannot create a new Tournament 1 -> Football // But I can create a Tournament 1 -> Tennis
        if(Tournament::whereRaw('name = ?', $request->input('name'))->exists()){
          $sameNameAndSport = false;
          $tournamentsAlreadyExists = Tournament::whereRaw('name = ?', $request->input('name'))->get();
          
            foreach ($tournamentsAlreadyExists as $tournamentAlreadyExists) {
                $courtsAlreadyExists = $tournamentAlreadyExists->courts;
                foreach ($courtsAlreadyExists as $courtAlreadyExists) {
                    if($courtAlreadyExists->fk_sports == $request->input('sport')){
                        $sameNameAndSport = true;
                        $sportName = $courtAlreadyExists->sport->name;
                    }
                }
            }
            
            if($sameNameAndSport){
                $customErrors[] = "Le sport \"".$sportName."\" est déjà lié au tournoi \"".$request->input('name')."\"";
            }
        }
        

        /* LARAVEL VALIDATION */
        // create the validation rules
        $rules = array(
            'name' => 'required|min:3|max:40',
            'sport' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails() || !empty($customErrors)) {
            $dropdownListSports = $this->getDropDownListSports();
            return view('tournament.create')->with('dropdownListSports', $dropdownListSports)->withErrors($validator->errors())->with('customErrors', $customErrors);
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
            // if there are teams, save them on the tournaments_has_team table
            if(!empty($request->input('teams'))){
                foreach ($request->input('teams') as $team) {
                    $tournament->teams()->attach($team);
                }
            }
            return redirect()->route('tournaments.index');
        }
    }

    /**
     * Show the form for editing the specified tournament.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @author Dessaules Loïc
     */
    public function edit($id)
    {
        $tournament = Tournament::find($id);
        $dropdownListSports = $this->getDropDownListSports();
        $dropdownListTeams = $this->getDropDownListTeams();
        $teamsAreParticipating = $tournament->teams;
        if(count($teamsAreParticipating) > 0){
            foreach ($teamsAreParticipating as $team) {
                $teamsAreParticipatingId[] = $team->id;
            }
        }else{
          $teamsAreParticipatingId = null;
        }

        // normal case, there is a sport linked
        if(isset($tournament->sport)){
            $sport = $tournament->sport; // get the sport linked
        }else{
            // Sport has been deleted
            $sport = null; 
        }
        return view('tournament.edit')->with('tournament', $tournament)
                                      ->with('dropdownListSports', $dropdownListSports)
                                      ->with('sport', $sport)
                                      ->with('dropdownListTeams', $dropdownListTeams)
                                      ->with('teamsAreParticipatingId', $teamsAreParticipatingId);
    }

    /**
     * Update the specified tournament in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @author Dessaules Loïc
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

        /*// Check if the name of the new tournaments and his sport is already linked in the DB
        // example : Tournament 1 -> Football // I cannot create a new Tournament 1 -> Football // But I can create a Tournament 1 -> Tennis
        if(Tournament::whereRaw('name = ?', $request->input('name'))->exists()){
          $sameNameAndSport = false;
          $tournamentsAlreadyExists = Tournament::whereRaw('name = ?', $request->input('name'))->get();

            foreach ($tournamentsAlreadyExists as $tournamentAlreadyExists) {
                $courtsAlreadyExists = $tournamentAlreadyExists->courts;
                foreach ($courtsAlreadyExists as $courtAlreadyExists) {
                    // For the edit mode, if I change for example only the date of the current tournament: The name and the sport already exists on DB, so the
                    // id of the same tournament's name must be not the same id as the current tournament's id in edit mode.
                    // now, we can edit the current's tournament :)
                    if($courtAlreadyExists->fk_sports == $request->input('sport') && $tournamentAlreadyExists->id != $id){
                        $sameNameAndSport = true;
                        $sportName = $courtAlreadyExists->sport->name;
                    }
                }
            }        
            
            if($sameNameAndSport){
                $customErrors[] = "Le sport \"".$sportName."\" est déjà lié au tournoi \"".$request->input('name')."\"";
            }
        }*/

        /* LARAVEL VALIDATION */
        // create the validation rules
        $rules = array(
            'name' => 'required|min:3|max:40',
            'sport' => 'required'
        );

        $validator = Validator::make($request->all(), $rules);

        /* errors detected */
        if ($validator->fails() || !empty($customErrors)) {
            $tournament = Tournament::find($id);
            if(isset($tournament->sport)){
                $sport = $tournament->sport;
            }else{
                $sport = null;
            }
            
            $dropdownListSports = $this->getDropDownListSports();
            $dropdownListTeams = $this->getDropDownListTeams();
            return view('tournament.edit')->with('dropdownListSports', $dropdownListSports)
                                          ->with('dropdownListTeams', $dropdownListTeams)
                                          ->with('tournament', $tournament)
                                          ->with('sport', $sport)
                                          ->with('customErrors', $customErrors)
                                          ->withErrors($validator->errors());
        } else {
          
            //Save the tournament
            $tournament = Tournament::find($id);
            $tournament->name = $request->input('name');
            $tournament->start_date = $request->input('startDate')." ". $request->input('startTime').":00";
            $tournament->event_id = 1; // TO CHANGE !!!!!!!!!!!!!
            $tournament->sport_id = $request->input('sport');
            $tournament->update();

            // Dissociate all teams linked to the tournament
            foreach ($tournament->teams as $team) {
              $team->tournament()->dissociate();
              $team->update();
            }
            // Accociate new teams linked
            foreach ($request->input('teams') as $teamId) {
              $team = Team::find($teamId);
              $team->tournament()->associate($tournament);
              $team->update();
            }

            return redirect()->route('tournaments.index');
        }
    }

    /**
     * Remove the specified tournament from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     *
     * @author Dessaules Loïc
     */
    public function destroy($id)
    {
        $tournament = Tournament::findOrFail($id);
        $tournament->delete();
        return redirect()->route('tournaments.index');
    }


    /*// The dropdown contains ONLY sports who have one or more courts linked
    private function getDropDownListSports(){
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
    }*/

    private function getDropDownListSports(){
      $sports = Sport::all();
      $sportsList = array();
      for ($i=0; $i < sizeof($sports); $i++) { 
        $sportsList[$sports[$i]->id] = $sports[$i]->name;
      }
      return $sportsList;
    }

    private function getDropDownListTeams(){
        $teams = Team::all();
        $dropdownList = array();
        for ($i=0; $i < sizeof($teams); $i++) { 
          $dropdownList[$teams[$i]->id] = $teams[$i]->name; 
        }
        return $dropdownList;
    }

}
