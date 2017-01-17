<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{	
	// I added this because when I try to save() Sport value an updated_At "xy" error appears
	// And with this that work
	public $timestamps = false;
	protected $fillable = array('name', 'description'); // -> We have to define all data we use on our sport table (For use ->all())
}
