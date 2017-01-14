<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{	
	// I added this because when I try to save() Sport value an updated_At "xy" error appears
	// And with this that work
	public $timestamps = false;
}
