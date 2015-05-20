<?php
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends \Eloquent implements UserInterface, RemindableInterface{
	
	public function getAuthIdentifier(){
		return $this->getKey();
	}

	public function getAuthPassword(){
		return $this->password;
	}

	public function getReminderEmail()
	{
		return $this->email;
	}
	
	public function getRememberToken()
	{
	    return $this->remember_token;
	}
	
	public function setRememberToken($value)
	{
	    $this->remember_token = $value;
	}
	
	public function getRememberTokenName()
	{
	    return 'remember_token';
	}
	
	public function comments(){
		return $this->hasMany('Comment');
	}
	
	public function posts(){
		return $this->hasMany('Post');
	}
	
	public function likes(){
		return $this->hasMany('Like');
	}
	
	public function inventories(){
		return $this->hasMany('Inventory');
	}
	
	public function using(){
		return $this->hasOne('Using');
	}
	public function ability(){
		return $this->hasOne('Ability');
	}
	
	public function attacks(){
		return $this->hasMany('Attack');
	}
}
