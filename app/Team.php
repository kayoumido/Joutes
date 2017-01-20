<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	public $timestamps = false;
    protected $fillable = ['name'];

    public function participants()
    {
        return $this->belongsToMany('App\Participant', 'participants_has_teams', 'fk_teams' ,'fk_participants');
    }

    public function tournaments() {
        return $this->belongsToMany('App\Tournament', 'tournaments_has_teams', 'fk_teams', 'fk_tournaments');
    }

    public function sports() {

        $sports;
        $tournaments = $this->tournaments;

        foreach ($tournaments as $tournament) {

            $courts = Tournament::findOrFail($tournament->id)->courts;
            foreach ($courts as $court) {

                $sports[] = Sport::findOrFail($court->fk_sports)->name;
            }
        }

        // Laravel creates a "tournaments" element in "team" array
        // It's unset because it isn't needed.
        unset($this['tournaments']);


        return $sports;
    }
}
