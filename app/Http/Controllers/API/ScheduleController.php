<?php

namespace App\Http\Controllers\API;

use App\Game;
use App\Pool;
use App\Tournament;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Response\Transformers\ScheduleTransformer;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class ScheduleController extends Controller {

    public function index(Request $request, $tournament_id) {

        $games;

        // check if a next match time was given
        if (empty($request->first_game_id)) {
            $games = $this->getFirst($request->nb_matches, $tournament_id);
        }
        else {
            $games = $this->refresh($request->nb_matches, $tournament_id, $request->first_game_id, $request->last_game_id);
        }

        return $games;
    }

    private function getFirst($limit, $tournament_id) {
        $games = Tournament::find($tournament_id)->GetActiveGames($limit , "");

        return $this->response->collection($games, new ScheduleTransformer);
    }

    private function refresh($limit, $tournament_id, $next, $last) {

        // get next match time and current time
        $time         = Game::find($next)->start_time;
        $current_time = Carbon::now("Europe/Berlin")->toTimeString();

        // check if an update is needed
        if ($time > $current_time) return json_encode(new \stdClass);

        // get next games
        $games = Tournament::find($tournament_id)->GetActiveGames($limit, $last);

        return $this->response->collection($games, new ScheduleTransformer);
    }
}
