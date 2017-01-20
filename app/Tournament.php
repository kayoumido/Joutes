<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    /**
     * Create a new belongs to relationship instance between Tournament and Event
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @author Doran Kayoumi
     */
    public function event() {
        return $this->belongsTo(Event::class, "fk_events");
    }

    /**
     * Create a new belongs to many relationship instance between Tournament and Court
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     * @author Doran Kayoumi
     */
    public function courts() {
        return $this->belongsToMany('App\Court', 'tournaments_has_courts', 'fk_tournaments', 'fk_courts');
    }

    /**
     * Create a new belongs to many relationship instance between Tournament and Team
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     *
     * @author Doran Kayoumi
     */
    public function teams() {
        return $this->belongsToMany('App\Team', 'tournaments_has_teams', 'fk_tournaments', 'fk_teams');
    }
}
