<?php



class UsingsTableSeeder extends Seeder {

	public function run()
	{
		$usings = array(
			       array(
					'user_id' => 1,
					'slot1' => 7,
					'slot2' => 9,
					'slot3' => null,
					'slot4' => null,
					'slot5' => null,
					'slot6' => null,
			       ),
			       );
		DB::table('usings')->insert($usings);
	}

}