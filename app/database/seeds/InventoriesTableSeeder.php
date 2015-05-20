<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class InventoriesTableSeeder extends Seeder {

	public function run()
	{
		DB::table('inventories')->delete();
		$inventories = array(
				     array(
					'item_id' => 7,
					'quantity' => 3,
					'user_id' => 1,
					   ),
				     array(
					'item_id' => 8,
					'quantity' => 4,
					'user_id' => 1,
					   ),
				     array(
					'item_id' => 9,
					'quantity' => 5,
					'user_id' => 1,
					   ),
				     
				     );
		
		DB::table('inventories')->insert($inventories);
	}

}