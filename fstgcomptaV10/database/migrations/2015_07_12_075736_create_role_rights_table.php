<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateRoleRightsTable extends Migration {

	public function up()
	{
		Schema::create('role_rights', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('idRole')->unsigned();
			$table->foreign('idRole')->references('id')->on('roles')
						->onDelete('restrict')
						->onUpdate('restrict');
			$table->integer('idRight')->unsigned();
			$table->foreign('idRight')->references('id')->on('rights')
						->onDelete('restrict')
						->onUpdate('restrict');

		});
	}

	public function down()
	{
		Schema::table('role_rights', function(Blueprint $table) {
			$table->dropForeign('role_rights_idRole_foreign');
			$table->dropForeign('role_rights_idRight_foreign');
		});
		Schema::drop('role_rights');
	}
}