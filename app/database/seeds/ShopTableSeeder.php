<?php



class ShopTableSeeder extends Seeder {

	public function run()
	{
		$shop = array(
			       array(
				'item_id' => 7,
				'price' => 2,
				
				),
			       array(
				'item_id' => 8,
				'price' => 500,
				
				),
			       array(
				'item_id' => 9,
				'price' => 99999,
				
				),
			       array(
				'item_id' => 10,
				'price' => 1000,
				
				),
			       array(
				'item_id' => 11,
				'price' => 1200,
				
				),
			       
			       );
		DB::table('shop')->insert($shop);
	}

}