<?php
namespace App\Http\Response\Transformers;

use App\Game;
use App\Team;
use League\Fractal\TransformerAbstract;

class ScheduleTransformer extends TransformerAbstract
{

    public function transform(Game $game) {

        return [
            'id'        => (int)    $game->id,
            'teams'     => [
                $game->team1()->name,
                $game->team2()->name,
            ],
            'court'     => (string) $game->court->name,
            'sport'     => (string) $game->court->sport->name,
            'date'      => (string) $game->date,
            'time'      => (string) $game->start_time,
        ];
    }

}
