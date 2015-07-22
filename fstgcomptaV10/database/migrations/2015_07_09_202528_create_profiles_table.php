<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{

		Schema::create('profiles', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 200)->unique();
            $table->integer('idRole')->unsigned();
            $table->foreign('idRole')->references('id')->on('roles')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('profiles', function(Blueprint $table) {
            $table->dropForeign('profiles_idRole_foreign');
        });
		Schema::drop('profiles');
	}

}
