<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class User extends Model implements Authenticatable
{	
	protected $fillable = ['username', 'password'];
	public $timestamps = false;
	protected $hidden = array('password');

	/* Implemented methods from Authenticatable */
	public function getAuthIdentifierName(){
	}
    public function getAuthIdentifier(){
    }
    public function getAuthPassword(){
    	return $this->password;
    }
    public function getRememberToken(){
    }
    public function setRememberToken($value){
    }
    public function getRememberTokenName(){
    }

}
