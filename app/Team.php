<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
	public $timestamps = false;
    protected $fillable = ['name'];

	/**
	 * Get team participants
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 *
	 * @author Doran Kayoumi
	 */
    public function participants()
    {
        return $this->belongsToMany('App\Participant')->withPivot('isCapitain');
    }

	/**
	 * Get team tournament
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 *
	 * @author Doran Kayoumi
	 */
    public function tournament() {
        return $this->belongsTo('App\Tournament');
    }

	/**
	 * Get sport of a team
	 *
	 * @return \Illuminate\Database\Eloquent\Model
	 *
	 * @author Doran Kayoumi
	 */
    public function sport() {
		return $this->tournament->sport();
    }
}
