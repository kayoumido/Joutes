<?php

namespace App\Http\Controllers\API;

use App\Game;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Response\Transformers\ScheduleTransformer;

class ScheduleController extends Controller {

    public function index(Request $request) {

        $after = empty($request->after) ? '0' : $request->after;

        $games = Game::schedule($request->limit);

        dd($games);

        return $this->response->collection($games, new ScheduleTransformer, ['key' => 'games']);
    }
}
