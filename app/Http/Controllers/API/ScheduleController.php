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
        $dt = Carbon::now("Europe/Berlin");

        // check if a next match time was given
        if (empty($request->next)) {
            $games = $this->getFirst($request->limit, $tournament_id, $dt->toTimeString());
        }
        else {
            $games = $this->refresh($request->limit, $tournament_id, $dt->toTimeString(), $request->next, $request->last);
        }

        return $games;
    }

    private function getFirst($limit, $tournament_id, $current_time) {
        $games = Tournament::find($tournament_id)->GetActiveGames($limit, $current_time);

        return $this->response->collection($games, new ScheduleTransformer);
    }

    private function refresh($limit, $tournament_id, $current_time, $next, $last) {
        // check if an update is needed
        if ($next > $current_time) return json_encode(new \stdClass);

        $games = Tournament::find($tournament_id)->GetActiveGames($limit, $last);

        return $this->response->collection($games, new ScheduleTransformer);
    }
}
