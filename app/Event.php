<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Team;

class Event extends Model
{
    /**
     * Create a new has many relationship instance between Event and Tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * @author Doran Kayoumi
     */
    public function tournaments() {
        return $this->hasMany('App\Tournament');
    }

    /**
     * Get specific tournament
     *
     * @param  int  $id
     * @return \Illuminate\Database\Eloquent\Model or void
     *
     * @author Doran Kayoumi
     */
    public function tournament($id) {

        // get event tournaments
        $tournaments = $this->tournaments()->get();

        // look for wanted tournament
        foreach ($tournaments as $tournament) {
            if ($tournament->id == $id) {
                return $tournament;
            }
        }
    }

    /**
     * Get specific team
     *
     * @param  int  $id
     * @return boolean
     *
     * @author Doran Kayoumi
     */
    public function team($id) {

        // get team with given id
        $team  = Team::findOrFail($id);

        // get tournaments in which the team is and tournaments in event
        $t_tournaments = $team->tournaments;
        $e_tournaments = $this->tournaments;

        // loop through team and event tournaments to see if a tournament matches
        foreach ($t_tournaments as $t_tournament) {

            foreach ($e_tournaments as $e_tournament) {

                if ($e_tournament->id === $t_tournament->id)
                    return true;
            }
        }
    }
}
