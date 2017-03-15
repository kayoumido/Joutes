<?php

namespace App\Http\Controllers;

use App\Event;
use App\Sport;
use App\Tournament;
use Illuminate\Http\Request;
use Dingo\Api\Routing\Helpers;
use App\Http\Response\Transformers\TournamentTransformer;
use App\Http\Response\Transformers\SingleTournamentTransformer;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class EventTournamentController extends Controller
{
    use Helpers;
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request  $request
     * @param int $event_id
     * @return \Illuminate\Http\Response
     *
     * @author Doran Kayoumi
     */
    public function index(Request $request, $event_id) {
        // check is it's an api request
        if ($request->is('api/*')) {
            // get event tournaments
            $tournaments = Event::findOrFail($event_id)->tournaments;

            return $this->response->collection($tournaments, new TournamentTransformer, ['key' => 'tournaments']);
        }


        $event = Event::findOrFail($event_id);
        $tournaments = $event->tournaments;
        return view('tournament.index', array(
            "tournaments" => $tournaments,
            "fromEvent" => true,
            "eventName" => $event->name
        ));

    }

    /**
     * Display the specified resource.
     *
     * @param \Illuminate\Http\Request  $request
     * @param  int  $event_id
     * @param  int  $tournament_id
     * @return \Illuminate\Http\Response
     *
     * @author Doran Kayoumi
     */
    public function show(Request $request, $event_id, $tournament_id) {
        // check is it's an api request
        if ($request->is('api/*')) {

            $tournament  = Event::findOrFail($event_id)->tournament($tournament_id);

            return $this->response->item($tournament, new SingleTournamentTransformer, ['key' => 'tournament']);
        }

        return true;
    }
}
