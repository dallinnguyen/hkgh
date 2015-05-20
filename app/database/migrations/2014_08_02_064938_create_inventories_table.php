<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInventoriesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('inventories', function(Blueprint $table)
		{
			$table->integer('user_id');
			$table->integer('slot1')->nullable();
			$table->integer('slot2')->nullable();
			$table->integer('slot3')->nullable();
			$table->integer('slot4')->nullable();
			$table->integer('slot5')->nullable();
			$table->integer('slot6')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('inventories');
	}

}
