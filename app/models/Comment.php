<?php

class Comment extends Eloquent{
    
    public function user(){
        return $this->belongsTo('User');
    }
    
     public function post(){
        return $this->belongsTo('Post','post_id');
    }
    
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
    
}