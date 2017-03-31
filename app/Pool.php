<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Model of pools table.
 *
 * @author Dessaules Loïc
 */
class Pool extends Model
{
	public $timestamps = false; // Disable timestamp created_at etc.
	//protected $fillable = array('fk_sports', 'name'); // -> We have to define all data we use on our courts table (For use : ->all())

    /**
     * Create a new belongs to relationship instance between pool and Tournament
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @author Loïc Dessaules
     */
    public function tournament(){
        return $this->belongsTo(Tournament::class);
    }

    /**
     * Create a new hasManyThrough relationship instance between pool and games between contenders
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @author Loïc Dessaules
     */
    public function games(){
        return $this->hasmanyThrough(Game::class, Contender::class, 'pool_id', 'contender1_id');
    }
}
