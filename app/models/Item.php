<?php

class Item extends \Eloquent {
    public function inventory(){
	return $this->hasMany('Inventory');
    }
    
    public function potion(){
        return $this->hasOne('Potion');
    }
    
}