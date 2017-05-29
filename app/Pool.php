<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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

    /**
     * Return an array with the current rankings on the pool
     *
     * @return Array
     *
     * @author Loïc Dessaules
     */
    public function rankings(){
        $teams = $this->teams();
        $games = $this->games;
        $games = Game::cleanEmptyContender($games);

        $rankings = array();

        if(!empty($teams)){
            foreach ($teams as $team) {
                $score = 0;
                $win = 0;
                $loose = 0;
                $draw = 0;
                $goalBalance = 0;
                foreach ($games as $game) {
                    if(!empty($game->score_contender1) || !empty($game->score_contender2)){
                        if($game->contender1->team->name == $team || $game->contender2->team->name == $team){
                            // $team do a draw (égalité)
                            if($game->score_contender1 == $game->score_contender2){
                                $score += 1;
                                $draw++;
                            }
                            // $team win the game
                            elseif($game->score_contender1 > $game->score_contender2 && $game->contender1->team->name == $team ||
                                $game->score_contender2 > $game->score_contender1 && $game->contender2->team->name == $team){
                                $score += 2;
                                $win++;
                            }
                            // $team loose the game
                            else{
                                $loose++;
                            }

                            // calcul the balance between goal+ ($team) and goal- (contender) 
                            if($game->contender1->team->name == $team){
                                $goalBalance += $game->score_contender1;
                                $goalBalance -= $game->score_contender2;
                            }elseif($game->contender2->team->name == $team){
                                $goalBalance += $game->score_contender2;
                                $goalBalance -= $game->score_contender1;
                            }
                        }
                    }
                }
                $rankings[] = array(
                    "team" => $team,
                    "score" => $score,
                    "W" => $win,
                    "L" => $loose,
                    "D" => $draw,
                    "+-" => $goalBalance
                ); 
            }
            $rankings = $this->sort($rankings);
        }
        return($rankings);
    }

    /**
     * Return an array sorted by score. More info for the sorting function:
     * http://php.net/manual/en/function.array-multisort.php
     * http://stackoverflow.com/questions/3232965/sort-multidimensional-array-by-multiple-keys
     *
     * @return Array
     * 
     * @param Array
     *
     * @author Loïc Dessaules
     */
    private function sort($rankings_row){
        $rankings_sort = array();
        foreach($rankings_row as $key=>$value) {
            $rankings_sort['score'][$key] = $value['score'];
            $rankings_sort['+-'][$key] = $value['+-'];
        }
        # sort by score desc and then +/- desc
        array_multisort($rankings_sort['score'], SORT_DESC, $rankings_sort['+-'], SORT_DESC, $rankings_row);

        return $rankings_row;
    }

    /**
     * Return all teams which participate to the pool. The returned array is : "team_id" => "team_name"
     *
     * @return Array
     *
     * @author Loïc Dessaules
     */
    private function teams(){
        $teams = array();
        foreach ($this->games as $game) {
            if(!empty($game->contender1->team)){
                $teams[$game->contender1->team->id] = $game->contender1->team->name;
            }
            if(!empty($game->contender2->team)){
                $teams[$game->contender2->team->id] = $game->contender2->team->name;
            }
        }
        return $teams;
    }

    /**
     * Return true or false if the pool is editable by the person connected or no
     *
     * @return boolean
     *
     * @author Loïc Dessaules
     */
    public function isEditable(){
        if(Auth::check()){
            $role = Auth::user()->role;
            if($role == "writter" || $role == "administrator"){
                if($this->isFinished == 0){
                    return true;
                }else{
                    return false;
                }
                return true;
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

}
