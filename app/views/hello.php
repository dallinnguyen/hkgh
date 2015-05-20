<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<style>
		@import url(//fonts.googleapis.com/css?family=Lato:700);

		body {
			margin:0;
			font-family:'Lato', sans-serif;
			text-align:center;
			color: #999;
		}

		.welcome {
			width: 300px;
			height: 200px;
			position: absolute;
			left: 50%;
			top: 50%;
			margin-left: -150px;
			margin-top: -100px;
		}

		a, a:visited {
			text-decoration:none;
		}

		h1 {
			font-size: 32px;
			margin: 16px 0 0 0;
		}
	</style>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>
<body>
	
	
	<?php
	
		
	
		function getFirstPostId($feeds){
			
				return $feeds['data'][0]['id'];
				
		}
		
		$facebook = new Facebook(Config::get('facebook'));
		
		$user_id = $facebook->getUser();
		$me = null;
		if($user_id){
			$me = $facebook->api('/me');
			//print_r($me['gender']);
			// print permission
			//$response = $facebook->api("/me/permissions");
			//print_r($response);
			
			
			
			//show name by fql
			//try {
			//	$fql = 'SELECT name from user where uid = ' . $user_id;
			//	$ret_obj = $facebook->api(array(
			//				   'method' => 'fql.query',
			//				   'query' => $fql,
			//				 ));
			//
			//	// FQL queries return the results in an array, so we have
			//	//  to get the user's name from the first element in the array.
			//	echo '<pre>Name: ' . $ret_obj[0]['name'] . '</pre>';
			//} catch(FacebookApiException $e) {
			//	// If the user is logged out, you can have a 
			//	// user ID even though the access token is invalid.
			//	// In this case, we'll get an exception, so we'll
			//	// just ask the user to login again here.
			//	$login_url = $facebook->getLoginUrl(); 
			//	echo 'Please <a href="' . $login_url . '">login.</a>';
			//	error_log($e->getType());
			//	error_log($e->getMessage());
			//}
			
			//getting status message of a user
			//$statuses = $facebook->api(array('method' => 'fql.query',
			//				 'query' => "select message from status where uid = me()"
			//				 ));
			//$i = 1;
			//echo '<table>';
			//foreach($statuses as $status){
			//	echo "<tr><td width = '5%'>" . $i . "</td>
			//	<td width = '95%'>" . $status['message'] . "</td></tr>";
			//	$i++;
			//}
			//
			//echo '</table>';
			
			//retrieving profile pictures of a user's friends ......... failed
			//echo '<br/>';
			//
			//echo "profile pictures of my friends";echo '<br/>';
			//try {
			//$fql   = 'SELECT uid, pic_square FROM user WHERE uid IN (SELECT uid2 FROM friend WHERE uid1 = me())';
			//$profile_pics = $facebook->api(array('method' => 'fql.query',
			//					'query' => $fql
			//				     ));
			//} catch(FacebookApiException $e) {
			//	// If the user is logged out, you can have a 
			//	// user ID even though the access token is invalid.
			//	// In this case, we'll get an exception, so we'll
			//	// just ask the user to login again here.
			//	$login_url = $facebook->getLoginUrl(); 
			//	echo 'Please <a href="' . $login_url . '">login.</a>';
			//	error_log($e->getType());
			//	error_log($e->getMessage());
			//}
			//print_r($profile_pics);
			//foreach($profile_pics as $pic){
			//	echo '<image src="' . $pic['pic_square'] . '" width="40" height="40" />';
			//}
			//echo '<br/>';
			
			//retrieving group members
			echo '<br/>';
			
			$gid = '188991197821626';
			echo "group members for id " . $gid;
			echo '<br/>';
			$fql = "select uid, name, pic_square, sex from user where uid in (select uid from group_member where gid='" . $gid ."')";
			$grp_members = $facebook->api(array('method' => 'fql.query',
							    'query' => $fql					
							    ));
			print_r($grp_members);
			
			
			//echo '<table width="100%">';
			//echo '<tr><th>User Id</th>
			//	<th>Name</th>
			//	<th>Sex</th>
			//	<th>Profile pic</th></tr>';
			//
			//foreach ($grp_members as $grp_member) {
			//	//$id = $grp_member['uid'];
			//	
			//	
			//	echo '<tr><td>' . $grp_member['uid'] . '</td>
			//		<td>' . $sex['gender'] . '</td>
			//		<td>' . $grp_member['gender '] . '</td>
			//		<td><img src = "' . $grp_member['pic_square'] . 
			//		'" /></td></tr>';
			//	
			//}
			//
			//echo '</table>';
			//echo '<br/>';
			
			
			//make a post
			//$post_type = '/' . $user_id . '/feed';
			//$post_params = array(
			//'message' => "Andolasoft, solutions delivered.\n\n Ruby on Rails Development | CakePHP Development | Android and iPhone Application Development"
			//);
			//
			//try{
			//$facebook->setAccessToken($access_token);
			//$fbpost = $facebook->api($post_type, 'POST', $post_params);
			//} catch (Exception $e) {
			//echo $e->getMessage();
			//}
		}
		if ($me){
			
			
			//print friend list
			echo '<br />';
			//$friendListID = $facebook->api('/me/friendlists');
			//if (isset($friendListID['data'][0]['id'])){
			//	echo $friendListID['data'][0]['id'];
			
			//	$friendlist = $facebook->api('/' . $friendListID['data'][0]['id'] . '/members');
			//	print_r($friendlist);
			//}
			
			//friends of yours who also use the app
			//$friends = $facebook->api('/me/friends');
			//print_r($friends);
			//echo '<ul>';
			//foreach ($friends["data"] as $value) {
			//    echo '<li>';
			//    echo '<div class="pic">';
			//    echo '<img src="https://graph.facebook.com/' . $value["id"] . '/picture"/>';
			//    echo '</div>';
			//    echo '<div class="picName">'.$value["name"].'</div>'; 
			//    echo '</li>';
			//}
			//echo '</ul>';
			
			echo '<br />';
			//$id = getFirstPostId($facebook->api('/me/posts'));
			
			//$like_id = $facebook->api('/'. $id. '/likes', 'POST');
			
		
			//$like_id = $facebook->api('/' . $id . '/like','POST' );
		}
		else{
			echo "session expired or user has not logined yet, redirecting...";
			$params = array(
				'scope' => 'publish_actions, user_status, user_groups, user_about_me',
				'redirect_uri' => 'https://apps.facebook.com/hiep_khach_giang_ho/'
			      );
			$loginUrl = $facebook->getLoginUrl($params);
			echo '<script>top.location.href="' . $loginUrl . '";</script>';
		}
		$logoutUrl = $facebook->getLogoutUrl(array('next' => 'https://apps.facebook.com/hiep_khach_giang_ho'));
		
		
	?>
	
	<h1>welcome</h1>
	<a href='#' onclick="top.location.href='<?php echo $logoutUrl;?>'; return false;">Logout</a>
	<a href='about.php' target='_top'>About</a>
	<a href='google.com' target='_top'>External Link</a>
	
	
	<!--<div id="fb-root"></div>
	<script>
		
		window.fbAsyncInit = function () {
		FB.init({
		appId      : '{{ Config::get('facebook.appId') }}', // App ID
		//channelUrl : '//www.YOUR_DOMAIN.COM/channel.html', // Channel File // @TODO: add this
		status     : true, // check login status
		cookie     : true, // enable cookies to allow the server to access the session
		xfbml      : true  // parse XFBML
		});
		};
		
		(function(d){
			var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
			if (d.getElementById(id)) {return;}
			js = d.createElement('script'); js.id = id; js.async = true;
			js.src = "//connect.facebook.net/en_US/all.js";
			ref.parentNode.insertBefore(js, ref);
		}(document));
		
		function loadFriends(){
			//get array of friends
			FB.api('/me/friends', function(response) {
			    console.log(response);
			    var thumbDiv=$('.facebook-friends');
			    for(i=0;i<77;i++) {
				    $(document.createElement("img")).attr({ src: 'https://graph.facebook.com/'+response.data[i].id+'/picture', title: response.data[i].name,onClick:'alert("You picked "+this.title);'})
				    .appendTo(thumbDiv);
				};
			});
		};
		
		$( document ).ready(function() {
			console.log( "ready!" );
			loadFriends();
		});
	</script>-->
	
	
	
	
</body>
</html>
