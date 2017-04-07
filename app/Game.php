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

    /**
     * Clears an array of game objects of contenders with no teams
     * @param  array $games - array of game objects to clean
     * @return array - cleaned array
     *
     * @author Doran Kayoumi
     */
    public static function cleanEmptyContender($games)
    {
        // loop through games to find ones where contenders don't have teams
        foreach ($games as $key => $game) {
            // check if contenders have a team
            if ($game->contender1->team == null || $game->contender2->team == null) {
                // if not remove it from array
                unset($games[$key]);
            }
        }
        return $games;
    }

}
