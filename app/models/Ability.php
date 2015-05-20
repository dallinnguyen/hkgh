<?php

class Ability extends \Eloquent {
	public function user(){
		return $this->belongsTo('User');
	}
}