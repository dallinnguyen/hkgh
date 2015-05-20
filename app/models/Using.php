<?php

class Using extends \Eloquent {
	
	public function User(){
		return $this->belongsTo('User');
	}
	
	public function item1(){
		return $this->belongsTo('Item','slot1');
	}
	public function item2(){
		return $this->belongsTo('Item','slot2');
	}
	public function item3(){
		return $this->belongsTo('Item','slot3');
	}
	public function item4(){
		return $this->belongsTo('Item','slot4');
	}
	public function item5(){
		return $this->belongsTo('Item','slot5');
	}
	public function item6(){
		return $this->belongsTo('Item','slot6');
	}
	
	public function findItem($id){
		if ($this->slot1 == $id)
			return "slot1";
		elseif($this->slot2 == $id)
			return "slot2";
		elseif($this->slot3 == $id)
			return "slot3";
		elseif($this->slot4 == $id)
			return "slot4";
		elseif($this->slot5 == $id)
			return "slot5";
		elseif($this->slot6 == $id)
			return "slot6";
		else
			return false;
			
	}
}