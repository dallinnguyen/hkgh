<?php

class Like extends \Eloquent {
	//protected $fillable = [];
	
	public function likable(){
		return $this->morphTo();
	}
	
	public function user(){
		return $this->belongsTo('User');
	}
	

}