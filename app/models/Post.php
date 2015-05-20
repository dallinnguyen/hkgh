<?php


class Post extends \Eloquent {
	
	public function date($date=null)
	{
		if(is_null($date)) {
		    $date = $this->created_at;
		}
	
		return $date->diffForHumans();
	}
	
	public function created_at()
	{
		return $this->date($this->created_at);
	}
	
	public function updated_at()
	{
		return $this->date($this->updated_at);
	}
	
	public function comments(){
		return $this->hasMany('Comment');
	}
	
	public function user(){
		return $this->belongsTo('User');
	}
	
	public function likes(){
		return $this->morphMany('Like','likable');
	}
	
	public function didHeLike($id){
		foreach($this->likes as $like){
			if ($like->user_id == $id)
				return true;
		}
		
		return false;
	}
	public function didHeAttack($id){
		foreach($this->attacks as $attack){
			if ($attack->user_id == $id)
				return true;
		}
		
		return false;
	}
	
	public function isUpdated(){
		return date_diff($this->created_at,$this->updated_at);
	}
	public function attacks(){
		return $this->hasMany('Attack');
	}
	
}