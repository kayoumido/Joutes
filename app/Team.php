<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	public $timestamps = false;
    protected $fillable = ['name'];

    public function participants()
    {
        return $this->belongsToMany('App\Participant')->withPivot('isCapitain');
    }

	/**
	 * Create a new belongs to many relationship instance between Team and Tournament
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 *
	 * @author Doran Kayoumi
	 */
    public function tournaments() {
        return $this->belongsToMany('App\Tournament', 'tournaments_has_teams', 'fk_teams', 'fk_tournaments');
    }

	/**
	 * Get sports of a team
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 *
	 * @author Doran Kayoumi
	 */
    public function sports() {

		// Get team tournaments
        $tournaments = $this->tournaments;
		$sports;

		// Loop through tournaments to get soorts
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
