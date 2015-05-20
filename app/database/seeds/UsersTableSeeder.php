<?php

// Composer: "fzaninotto/faker": "v1.3.0"
//use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder {

	public function run()
	{
		//$faker = Faker::create();
		
		//DB::table('users')->delete();
		$users = array(
				array(
				       'username' => 'dallinnguyen',
				       'email' => 'hellyeahwarriors@gmail.com',
				       'name' => 'Ma kiếm lang',
				       'gender' => 'nam',
				       'about' => 'Ma kiếm lang, đệ tử của Kiếm Vương. Phụng lệnh Kiếm Vương xuống Trung Nguyên tìm cuốn bí kíp võ công của Kiếm Ma. Nhưng lại bị cuốn vào thứ võ công ma quái của Kiếm Ma, mất kiểm soát dẫn đến giết người hàng loạt, được giang hồ mệnh danh là Ma Kiếm Lang.',
				       'link' => 'https://www.facebook.com/dallin.nguyen',
				       'photo' => '../img/uploads/profiles/kiem-ma.jpg', 
				       'money' => 1224343211,
				       'role' => 'master',
				       
				       
				      )
			      );
		
		DB::table('users')->insert($users);
	}

}