<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('firstName',50);
			$table->string('lastName',50);
			$table->string('email',100)->unique();
			$table->string('email2',100)->unique();
			$table->string('tel');
			$table->integer('idProfile')->unsigned();
			$table->foreign('idProfile')
				  ->references('id')
				  ->on('profiles')
				  ->onDelete('restrict')
				  ->onUpdate('restrict');
			$table->string('password',60);
			$table->timestamps();
			$table->rememberToken();

			
        });

		
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function(Blueprint $table) {
			$table->dropForeign('users_idProfile_foreign');
		});

		Schema::drop('users');
	}

}
