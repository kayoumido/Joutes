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

        // check if a first_game_id was given
        if (!empty($request->first_game_id)) {
            // get next match time and current time
            $time         = Game::find($request->first_game_id)->start_time;
            $current_time = Carbon::now("Europe/Berlin")->toTimeString();

            // check if an update is needed
            if ($time > $current_time) return json_encode(new \stdClass);
        }

        $games = Tournament::find($tournament_id)->GetActiveGames($request->nb_matches, $request->last_game_id);

        return $this->response->collection($games, new ScheduleTransformer);
    }
}
