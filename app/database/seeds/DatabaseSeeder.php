<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		//$this->call('UsersTableSeeder');
		$this->call('InventoriesTableSeeder');
		$this->call('PostsTableSeeder');
		$this->call('TrophiesTableSeeder');
		$this->call('WarriorsTableSeeder');
		$this->call('ItemsTableSeeder');
		$this->call('CommentsTableSeeder');
		$this->call('LikesTableSeeder');
		$this->call('ShopTableSeeder');
		$this->call('UsingsTableSeeder');
		$this->call('AbilitiesTableSeeder');
		$this->call('PotionsTableSeeder');
	}

}
