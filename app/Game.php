<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Model of games table.
 *
 * @author Dessaules Loïc
 */
class Game extends Model
{

	/**
     * Create a new belongs to relationship instance between games and contenders (to have the first contender)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @author Loïc Dessaules
     */
    public function contender1(){
        return $this->belongsTo(Contender::class, 'contender1_id');
    }

    /**
     * Create a new belongs to relationship instance between games and contenders (to have the second contender)
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @author Loïc Dessaules
     */
    public function contender2(){
        return $this->belongsTo(Contender::class, 'contender2_id');
    }

}
