<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class WarriorsTableSeeder extends Seeder {

	public function run()
	{
		$warriors = array(
				  array(
					'strengh' => 15,
					'agility' => 10,
					'intelligence' => 8,
					'hp' => 100,
					'mana' => 50,
					'damage' => 10,
					'armor' => 2,
					'skill_1' => 1,
					'skill_2' => 2,
					'skill_3' => 3
					),
				  );
		DB::table('warriors')->insert($warriors);
	}

}