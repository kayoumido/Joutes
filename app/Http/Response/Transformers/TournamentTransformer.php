<?php
namespace App\Http\Response\Transformers;

use App\Tournament;
use League\Fractal\TransformerAbstract;

class TournamentTransformer extends TransformerAbstract
{
    // public $availableIncludes = [
    //     "schedules"
    // ];
    public function transform(Tournament $tournament) {
    // return array_merge($tournament->toArray(), [
    //     "sport"=>$tournament->sport->name
    // ]);
        return [
            'id'     => (int) $tournament->id,
            'name'   => (string) $tournament->name,
            'sport'  => (string) $tournament->sport->name,
            'place'  => '',
            'winner' => [],
            'second' => [],
            'third'  => [],
        ];
    }
    // public function includeSport(Tournament $tournament) {
    //     return $this->collection($tournament->schedules, new ScheduleTransformer);
    // }
}
