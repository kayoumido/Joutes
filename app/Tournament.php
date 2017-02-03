<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

/**
 * Model of tournaments table.
 *
 * @author Dessaules Loïc
 */

class Tournament extends Model
{

    // I added this because when I try to save() Sport value an updated_At "xy" error appears
    // And with this that work
    public $timestamps = false;
    protected $fillable = array('name', 'start_date', 'end_date', 'start_time', 'fk_events'); // -> We have to define all data we use on our sport table (For use ->all())
    protected $dates = ['start_date', 'end_date']; //need to user convert format date

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
