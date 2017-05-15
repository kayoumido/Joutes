<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {

    public $timestamps = false;
    protected $fillable = array('score_contender1', 'score_contender2', 'date', 'start_time', 'contender1_id', 'contender2_id', 'court_id');

    public function contender1() {
        return $this->belongsTo('App\Contender', 'contender1_id');
    }

    public function contender2() {
        return $this->belongsTo('App\Contender', 'contender2_id');
    }

    public function court() {
        return $this->belongsTo('App\Court');
    }

    public function sport() {
        return $this->court->sport;
    }

    public function team1() {
        return $this->contender1->team;
    }

    public function team2() {
        return $this->contender2->team;
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

    /**
     * Get games for schedule
     * @param  integer  $limit - number of games wanted
     * @param  time     $after - Time after which games are wanted
     * @return array - array of games
     *
     * @author Doran Kayoumi
     */
    public static function schedule($limit, $after = '0') {

        $games = self::where('start_time', '>=', $after)
            ->orderBy('date', 'ASC')
            ->orderBy('start_time', 'ASC')
            ->get();

        $games = self::cleanEmptyContender($games);

        return $games->take($limit);
    }
}
