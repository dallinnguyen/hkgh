<?php

class Potion extends \Eloquent {
	public function item (){
		return $this->belongsTo('Item');
	}
}