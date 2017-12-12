<?php
namespace App\Http\Response\Transformers;

use App\Game;
use League\Fractal\TransformerAbstract;

class PoolMatchesTransformer extends TransformerAbstract
{
    public function transform(Game $game) {
        return [
            'id'                => (int) $game->id,
            'scoreContender1'   => (int) $game->score_contender1,
            'scoreContender2'   => (int) $game->score_contender2,
            'contender1Name'    => (string) $game->contender1->team->name,
            'contender2Name'    => (string) $game->contender2->team->name,
            'startTime'         => $game->start_time,
            'isFinished'        => (bool) ($game->score_contender1 != 0 && $game->score_contender2 != 0)
        ];
    }
}
