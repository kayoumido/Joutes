<?php

namespace App\Http\Controllers\API;

use App\Game;
use Dingo\Api\Routing\Helpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Response\Transformers\ScheduleTransformer;

class ScheduleController extends Controller {

    use Helpers;

    public function index(Request $request) {
        $games = Game::all();

        return $this->response->collection($games, new ScheduleTransformer, ['key' => 'games']);
    }
}
