<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class ItemsTableSeeder extends Seeder {

	public function run()
	{
		DB::table('items')->delete();
		$items = array(
			       array(
				'name' => 'nước tăng lực cấp 1',
				'description' => 'tăng 10 HP',
				'class' => 'potion',
				'photo' => '../img/uploads/items/potion_lv1.jpg',
				     ),
			       array(
				'name' => 'huyền băng kiếm',
				'description' => 'tăng 10 điểm sức mạnh',
				'class' => 'weapon',
				'photo' => '../img/uploads/items/huyen-bang-kiem.jpg',
				     ),
			       array(
				'name' => 'bá vương khiên',
				'description' => 'ngăn chặn mọi đòn tấn công thông thường',
				'class' => 'weapon',
				'photo' => '../img/uploads/items/ba-vuong-khien.jpg',
				     ),
			       
			       array(
				'name' => 'trang phục dự dạ hội',
				'description' => 'trang phục dùng cho dạ hội',
				'class' => 'clothes',
				'photo' => '../img/uploads/items/clothes_1.jpg',
				     ),
			       array(
				'name' => 'trang phục dự dạ hội',
				'description' => 'trang phục dùng cho dạ hội',
				'class' => 'clothes',
				'photo' => '../img/uploads/items/clothes_2.jpg',
				     ),
			       );
		DB::table('items')->insert($items);
	}

}