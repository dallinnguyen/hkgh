<?php


class CommentsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('comments')->delete();
		$comments = array(array(
					'post_id' => '10',
					'user_id' => '2',
					'content' => 'hoa liên chào dallin',
					'likes' => 3,
					),
				  array(
					'post_id' => '10',
					'user_id' => '3',
					'content' => 'tống lợi chào dallin',
					'likes' => 5,
					),
				  array(
					'post_id' => '12',
					'user_id' => '1',
					'content' => 'dallin chào hoa liên',
					'likes' => 200,
					),
				  array(
					'post_id' => '12',
					'user_id' => '3',
					'content' => 'tống lợi chào hoa liên',
					'likes' => 1000,
					),
				  array(
					'post_id' => '11',
					'user_id' => '1',
					'content' => 'dallin chào tống lợi',
					'likes' => 4,
					),
				  array(
					'post_id' => '11',
					'user_id' => '2',
					'content' => 'hoa liên chào tống lợi',
					'likes' => 19,
					),
				  );

		DB::table('comments')->insert($comments);
	}

}