<?php

class PostController extends BaseController {
    
    protected $post;
    
	
    protected $user;
	
    
    public function __construct(Post $post, User $user){	
	$this->post = $post;
	$this->user = $user;
    }
    
    public function index(){
	    try{
                    $response = [
                        'posts' => []
                    ];
                    $statusCode = 200;
                    $posts = Post::all()->take(6);
             
                    foreach($posts as $post){
             
                        $response['posts'][] = [
                            'id' => $post->id,
                            'user' => $post->user_id,
                            'post_content' => $post->content,
                            'HP' => $post->HP
                        ];
             
             
                    }
                    return Response::json($response, $statusCode);
             
            }catch (Exception $e){
                    $statusCode = 404;
                    return Response::json($response, $statusCode);
                }
    }

    public function likeUpdate($id){
        $post = Post::find($id);
        $like = new Like;
        $like->user_id = $post->user_id;
        $like->likable_id = $id;
        $like->likable_type = 'Post';
        $like->save();
	
	return $this->showPost($id);
	
        //return Redirect::to('/');
	
	
    }
    
    public function bootHP($id){
	$post = Post::find($id);
	$user = Auth::user();
	$ability = $user->ability()->first();
	$item_id = $ability->drink;
	if ($user->role != 'master'){
	    $inventory = $user->inventories()->where('item_id',$item_id)->first();
	    if ($inventory != null){
		
		if ($inventory->quantity > 1){
		    
		    $inventory->quantity -= 1;
		    $inventory->save();
		}else{
		    
		    $inventory->delete();
		}
	    }else{
		
		$using = $user->using()->first();
		$slot = $using->findItem($item_id);
		if (!$slot)
		    return "không tìm thấy item trong 6 slot";
		else{
		    $using->$slot = null;
		    $using->save();
		    
		    //update ability
		    $ability->drink = 0;
		    $ability->save();
		}
	    }
	}
	$potion = Potion::where('item_id',$item_id)->first();
	$post->HP += $potion->amount;
	if ($post->HP > 100)
	    $post->HP = 100;
	$post->save();
	return $this->showPost($id);
	
    }
    
    public function attackPost($id){
	$post = Post::find($id);
	$user = Auth::user();
	$ability = $user->ability()->first();
	$post->HP -= $ability->damage;
	if ($post->HP < 1)
	    $post->HP = 1;
	$post->save();
	
	//save attack table
	if ($user->role != 'master'){
	    $attack = new Attack;
	    $attack->user_id = $user->id;
	    $attack->post_id = $id;
	    $attack->damage = $ability->damage;
	    $attack->save();
	    
	}
	return $this->showPost($id);
    }
    
    public function newPost(){
	if (Input::has('post')){
	    $post = new Post;
	    $post->user_id = Auth::user()->id;
	    $post->content = Input::get('post');
	    $post->HP = 100;
	    
	    $post->save();
	    return $this->showPost($post->id);
	}
	return Redirect::to('/');
	
    }
    
    public function newComment(){
	if (Input::has('post')&&Input::has('postid')){
	    $comment = new Comment;
	    $comment->user_id = Auth::user()->id;
	    $comment->post_id = Input::get('postid');
	    $comment->content = Input::get('post');
	    $comment->save();
	    
	    return $this->showPost($comment->post_id)->with('commentCreated',true);
	}
	return Redirect::to('/');
    }
    
    public function killPost($id){
	$post = Post::find($id);
	//remove comment first
	$post->comments()->delete(); //remember comments() not comments
	
	//then remove post
	$post = Post::find($id);
	$post->delete();
	return Redirect::to('/');
    }
    
    public function showPost($id){
        $posts = $this->post->with('user','comments')->orderBy('created_at', 'DESC')->limit(6)->get();
        
        $readingPost = $posts->find($id);
	
        if (isset($commentCreated)){
	    return View::make('index')->with('posts',$posts)
                                ->with('readingPost',$readingPost)
				->with('commentCreated',$commentCreated);
	}else
	    return View::make('index')->with('posts',$posts)
                                ->with('readingPost',$readingPost);
    }
    
    public function editPost(){
	if (Input::has('post')&&Input::has('postid')){
	    $id = Input::get('postid');
	    $post = Post::find($id);
	    $post->content = Input::get('post');
	    $post->save();
	    
	    return $this->showPost($id);
	}
	return Redirect::to('/');
	
    }
    
    public function likeComment($id){
	
	$comment = Comment::find($id);
        $like = new Like;
        $like->user_id = Auth::user()->id;
        $like->likable_id = $id;
        $like->likable_type = 'Comment';
        $like->save();
	
	
	
	return $this->showPost($comment->post->id);
    }
    
    public function unlikeComment($id){
	$comment = Comment::find($id);
        $like = Like::where('likable_type','Comment')->where('likable_id',$id)->first();
	$like->delete();
	return $this->showPost($comment->post->id);
    }
    
    //comment
    public function removeComment($id){
        $comment = Comment::find($id);
	$postId = $comment->post->id;
        //remove all the likes of that comment first
        $comment->likes()->delete();
        
        //then remove the comment
        $comment->delete();
	return $this->showPost($postId);
        
        
    }
    
    public function sessionUpdate(){
	$data = Input::all();
	if(Request::ajax()){
	    if (Input::has('cmdheight'))
		Session::flash('cmdheight', $data['cmdheight']);
	    
	    
	}
    }
    
    public function editComment(){
	if (Input::has('post')&&Input::has('commentid')){
	    $id = Input::get('commentid');
	    $comment = Comment::find($id);
	    $comment->content = Input::get('post');	    
	    $comment->save();
    
	    return $this->showPost($comment->post->id);
	}
	return Redirect::to('/');
    }
    
    

    //helping funciton 
    function doAlert($msg) 
    {
        echo '<script type="text/javascript">alert("' . $msg . '"); </script>';
    }
    
    function debug_to_console( $data ) {

	if ( is_array( $data ) )
	    $output = "<script>console.log( 'Debug Objects: " . implode( ',', $data) . "' );</script>";
	else
	    $output = "<script>console.log( 'Debug Objects: " . $data . "' );</script>";
    
	echo $output;
    }
}