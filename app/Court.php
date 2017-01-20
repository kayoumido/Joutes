<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Court extends Model
{
    public function sport()
    {
        return $this->belongsTo(Sport::class, "fk_sports");
    }
}
