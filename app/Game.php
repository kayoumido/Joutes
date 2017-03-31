<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model {

    public function contender1() {
        return $this->belongsTo('App\Contender', 'contender1_id');
    }

    public function contender2() {
        return $this->belongsTo('App\Contender', 'contender2_id');
    }

    public function court() {
        return $this->belongsTo('App\Court');
    }

    public function sport() {
        return $this->court->sport;
    }

    public function team1() {
        return $this->contender1->team;
    }

    public function team2() {
        return $this->contender2->team;
    }
}
