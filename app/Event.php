<?php

namespace App;

use App\Team;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Event extends Model
{
    /**
     * Get event tournaments
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
     * Get event teams
     * @return \Illuminate\Database\Eloquent\Model
     *
     * @author Doran Kayoumi
     */
    public function teams() {
        return $this->hasManyThrough('App\Team', 'App\Tournament');
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
