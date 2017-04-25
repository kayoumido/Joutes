<?php

namespace App\Http\Controllers\API;

use App\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Response\Transformers\ScheduleTransformer;
use Carbon\Carbon;

class ScheduleController extends Controller {

    public function index(Request $request) {

        // get current date time
        $dt = Carbon::now("Europe/Berlin");
        // for development purposes it's set to 10
        $dt->hour   = 9;
        $dt->minute = 0;

        $games = Game::schedule($request->limit, $dt->toTimeString());

        return $this->response->collection($games, new ScheduleTransformer);
    }
}
