<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

class Event extends Model
{
    public function tournaments() {
        return $this->hasMany('App\Tournament', 'fk_events');
    }
}
