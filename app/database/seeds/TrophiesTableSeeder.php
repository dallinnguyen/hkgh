<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class TrophiesTableSeeder extends Seeder {

	public function run()
	{
		$trophies = array(
				  array(
					'name' => '100 like',
					'description' => 'đạt được 100 like tích lũy',
					'user_id' => 1
					),
				  array(
					'name' => 'HP = 1',
					'description' => 'bị thiên hạ chém tới trọng thương',
					'user_id' => 1
					),
				  array(
					'name' => 'level 100',
					'description' => 'đạt level 100',
					'user_id' => 1
					),
				  );
		DB::table('trophies')->insert($trophies);
	}

}