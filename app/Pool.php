<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
/**
 * Model of pools table.
 *
 * @author Dessaules Loïc
 */
class Pool extends Model
{
	public $timestamps = false; // Disable timestamp created_at etc.
	//protected $fillable = array('fk_sports', 'name'); // -> We have to define all data we use on our courts table (For use : ->all())

    /**
     * Create a new belongs to relationship instance between Court and Sport
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @author Loïc Dessaules
     */
    public function tournament(){
        return $this->belongsTo(Tournament::class);
    }

}
