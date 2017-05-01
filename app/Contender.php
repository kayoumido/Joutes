<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Model of contenders table.
 *
 * @author Dessaules Loïc
 */
class Contender extends Model
{
	/**
     * Create a new belongs to relationship instance between games and contenders (to have the first contender)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @author Loïc Dessaules
     */
    public function team(){
        return $this->belongsTo(Team::class);
    }

}