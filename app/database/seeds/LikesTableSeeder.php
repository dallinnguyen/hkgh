<?php



class LikesTableSeeder extends Seeder {

	public function run()
	{
		$likes = array(
			       array(
					'user_id' => 1,
					'likable_id' => 10,
					'likable_type' => 'Post'
				     ),
			       array(
					'user_id' => 1,
					'likable_id' => 11,
					'likable_type' => 'Post'
				     ),
			       array(
					'user_id' => 1,
					'likable_id' => 12,
					'likable_type' => 'Post'
				     ),
			       array(
					'user_id' => 2,
					'likable_id' => 11,
					'likable_type' => 'Post'
				     ),
			       array(
					'user_id' => 3,
					'likable_id' => 12,
					'likable_type' => 'Post'
				     ),
				
				
			       );
		
		DB::table('likes')->insert($likes);
	}

}