<?php

namespace App\Http\Controllers\API;

use App\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Response\Transformers\ScheduleTransformer;
use Carbon\Carbon;

class ScheduleController extends Controller {

    public function index(Request $request) {

        $games;
        $dt = Carbon::now("Europe/Berlin");

        // check if a next match time was given
        if (empty($request->next)) {
            $games = $this->getFirst($request->limit, $dt->toTimeString());
        }
        else {
            $games = $this->refresh($request->limit, $dt->toTimeString(), $request->next, $request->last);
        }

        return $games;
    }

    private function getFirst($limit, $current_time) {
        $games = Game::schedule($limit, $current_time);

        return $this->response->collection($games, new ScheduleTransformer);
    }

    private function refresh($limit, $current_time, $next, $last) {
        // check if an update is needed
        if ($next > $current_time) return json_encode(new \stdClass);

        $games = Game::schedule($limit, $last);

        return $this->response->collection($games, new ScheduleTransformer);
    }
}
