<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRightsTable extends Migration {

	public function up()
	{
		Schema::create('rights', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('right', 100)->unique();
		});
	}

	public function down()
	{
		Schema::drop('rights');
	}
}