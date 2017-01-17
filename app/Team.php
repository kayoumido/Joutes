<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	public $timestamps = false;
    protected $fillable = ['name'];

    public function participants()
    {
        return $this->belongsToMany('App\Participant', 'participants_has_teams', 'fk_participants' ,'fk_teams');
    }

}
