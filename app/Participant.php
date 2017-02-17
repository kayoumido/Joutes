<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    // I added this because when I try to save() Sport value an updated_At "xy" error appears
    // And with this that work
    public $timestamps = false;
    protected $fillable = array('id', 'first_name', 'last_name'); // -> We have to define all data we use on our courts table (For use : ->all())

    public function teams()
    {
        return $this->belongsToMany('App\Team', 'participants_has_teams', 'fk_participants' ,'fk_teams');
    }
}
