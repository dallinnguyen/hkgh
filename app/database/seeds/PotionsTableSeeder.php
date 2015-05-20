<?php



class PotionsTableSeeder extends Seeder {

	public function run()
	{
		$potions = array(
				array(
					'item_id' => 7,
					'amount' => 10
				      ),
				 );
		DB::table('potions')->insert($potions);
	}

}