<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    public function courts()
    {
        return $this->hasMany('App\Court', 'fk_sports');
    }
}
