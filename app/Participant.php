<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Participant extends Model
{
    public function teams()
    {
        return $this->belongsToMany('App\Team', 'participants_has_teams', 'fk_participants' ,'fk_teams');
    }
}
