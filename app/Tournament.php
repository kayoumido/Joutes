<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    public function event()
    {
        return $this->belongsTo(Event::class, "fk_events");
    }

    public function courts()
    {
        return $this->belongsToMany('App\Court', 'tournaments_has_courts', 'fk_tournaments', 'fk_courts');
    }

    public function teams()
    {
        return $this->belongsToMany('App\Team', 'tournaments_has_teams', 'fk_tournaments', 'fk_teams');
    }
}
