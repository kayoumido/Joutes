<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Event extends Model
{
    public function tournaments() {
        return $this->hasMany('App\Tournament', 'fk_events');
    }

    public function tournament($id) {
        $tournaments = $this->tournaments()->get();

        foreach ($tournaments as $tournament) {
            if ($tournament->id == $id) {
                return $tournament;
            }
        }

    }
}
