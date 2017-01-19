<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model {

    public function tournaments() {
        return $this->belongsToMany('App\Tournament', 'tournaments_has_teams', 'fk_teams', 'fk_tournaments');
    }
}
