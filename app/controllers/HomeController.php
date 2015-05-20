<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/
	
	protected $post;
	
	protected $user;
	
	public function __construct(Post $post, User $user){
		
		
		
		$this->post = $post;
		$this->user = $user;
	}

	public function showWelcome()
	{
		//$access_token = $this->tokenHandler();
		
		//$posts = Post::all();
		
		//return $this->login_handler();
		//return View::make('hello')
		//->with('access_token',$access_token) ;
		//return View::make('index')->with('posts',$posts);
		
		return View::make('welcome');
		
	}
	
	public function Index(){
		
		
		$posts = $this->post->with('user','comments')->orderBy('created_at', 'DESC')->limit(6)->get();
		//$comments = $this->post->comment()->orderBy('created_at','DESC')->get();
		//$user = $
		return View::make('index')->with('posts',$posts);
	}
	
	public function showTest(){
		
		return View::make('index');
	}
	
	function login_handler(){
		$facebook = new Facebook(Config::get('facebook'));
		
		$user_id = $facebook->getUser();
		
		$me = null;
		if($user_id){
			$me = $facebook->api('/me');	
		}
		if ($me){
			return View::make('index');
		}else{
			
			return View::make('welcome');
			//echo "session expired or user has not logined yet, redirecting...";
			//$params = array(
			//	'scope' => '',
			//	'redirect_uri' => 'https://apps.facebook.com/hiep_khach_giang_ho/'
			//      );
			//$loginUrl = $facebook->getLoginUrl($params);
			//echo '<script>top.location.href="' . $loginUrl . '";</script>';
		}
	}
	
	//public function login(){
	//	$facebook = new Facebook(Config::get('facebook'));
	//	$params = array(
	//				'scope' => '',
	//				'redirect_uri' => 'https://apps.facebook.com/hiep_khach_giang_ho/'
	//			      );
	//	$loginUrl = $facebook->getLoginUrl($params);
	//	echo '<script>top.location.href="' . $loginUrl . '";</script>';
	//}
	
	function doAlert($message){
		echo '<script type="text/javascript">alert("' . $message . '"); </script>';
	}
	
	function curl_get_file_contents($URL) {
			$c = curl_init();
			curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($c, CURLOPT_URL, $URL);
			$contents = curl_exec($c);
			$err  = curl_getinfo($c,CURLINFO_HTTP_CODE);
			curl_close($c);
			if ($contents) return $contents;
			else return FALSE;
	}
	
	function tokenHandler(){
		$access_token = "YOUR_STORED_ACCESS_TOKEN";

		if (isset($_REQUEST["code"])){
			$token_url="https://graph.facebook.com/oauth/access_token?client_id="
				. Config::get('facebook.appId') . "&redirect_uri=" . urlencode(Config::get('app.url')) 
				. "&client_secret=" . Config::get('facebook.secret') 
				. "&code=" . $_REQUEST["code"] . "&display=popup";
			$response = @file_get_contents($token_url);
			$params = null;
			parse_str($response, $params);
			if (isset($params['access_token'])){
			$access_token = $params['access_token'];
			
			}
		}
		
		// Attempt to query the graph:
		$graph_url = "https://graph.facebook.com/me?"
		  . "access_token=" . $access_token;
		$response = $this->curl_get_file_contents($graph_url);
		$decoded_response = json_decode($response);
		//print_r($decoded_response);
		//Check for errors
		
		if (isset($decoded_response->error)) {
			
		// check to see if this is an oAuth error:
			if ($decoded_response->error->type== "OAuthException") {
				
				// Retrieving a valid access token. 
				$dialog_url= "https://www.facebook.com/dialog/oauth?"
					. "client_id=" . Config::get('facebook.appId') 
					. "&redirect_uri=" . urlencode(Config::get('app.url'));
				echo("<script> top.location.href='" . $dialog_url 
					. "'</script>");
			  }
			  else {
			    echo "other error has happened";
			  }
		} 
		else {
			// success
			echo("success" . $decoded_response->name);
			echo($access_token);
			return $access_token;
		}
	}
	
	//function helper
	public function likeAPost($post){
		$this->doAlert('ok now');
	}
	
	

}
