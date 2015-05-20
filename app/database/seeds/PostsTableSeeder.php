<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class PostsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('posts')->delete();
		$posts = array(
			       array(
				     
				     'content' => 'đây là bài post đầu tiên của dallin, hi vọng mọi người enjoy the app',
				     'likes' => 4,
				     'user_id' => 1,
				     'on_top' => false
				     ),
			       array(
				     'content' => 'ta là tống lợi của thần địa',
				     'likes' => 7,
				     'user_id' => 3,
				     'on_top' => true
				     ),
				array(
				     'content' => 'mình là nữ kiếm khách',
				     'likes' => 7,
				     'user_id' => 2,
				     'on_top' => true
				     ),
			       
			       );
		DB::table('posts')->insert($posts);
	}

}