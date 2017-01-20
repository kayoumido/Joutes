<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use App\Team;

class Event extends Model
{
    public function tournaments() {
        return $this->hasMany('App\Tournament', 'fk_events');
    }

    public function tournament($id) {
        $tournaments = $this->tournaments()->get();

        foreach ($tournaments as $tournament) {
            if ($tournament->id == $id) {
                return $tournament;
            }
        }
    }

    public function team($id) {
        $team  = Team::findOrFail($id);

        // get tournaments in which the team is and tournaments in event
        $t_tournaments = $team->tournaments;
        $e_tournaments = $this->tournaments;

        foreach ($t_tournaments as $t_tournament) {

            foreach ($e_tournaments as $e_tournament) {

                if ($e_tournament->id === $t_tournament->id)
                    return true;
            }
        }
    }
}
