<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRightRoleTable extends Migration {

	public function up()
	{
		Schema::create('right_role', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('role_id')->unsigned();
			$table->foreign('role_id')->references('id')->on('roles')
						->onDelete('restrict')
						->onUpdate('restrict');
			$table->integer('right_id')->unsigned();
			$table->foreign('right_id')->references('id')->on('rights')
						->onDelete('restrict')
						->onUpdate('restrict');

		});
	}

	public function down()
	{
		Schema::table('right_role', function(Blueprint $table) {
			$table->dropForeign('right_role_role_id_foreign');
			$table->dropForeign('right_role_right_id_foreign');
		});
		Schema::drop('right_role');
	}
}