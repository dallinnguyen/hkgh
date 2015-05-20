<?php



class AbilitiesTableSeeder extends Seeder {

	public function run()
	{
		$abilities = array(
				   array(
					'user_id' => 1,
					'damage' => 0,
					'drink' => 0
					 ),
				   );
		DB::table('abilities')->insert($abilities);
	}

}