<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepensesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('depenses', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idCompterepartition')->unsigned();
			$table->foreign('idCompterepartition')->references('id')->on('compte_repartition')
						->onDelete('restrict')
						->onUpdate('restrict');
			$table->integer('idTypedepense')->unsigned();
			$table->foreign('idTypedepense')->references('id')->on('typedepenses')
						->onDelete('restrict')
						->onUpdate('restrict');
			$table->integer('valeur');
			$table->integer('etat');
			$table->string('details');
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
		Schema::table('depenses', function(Blueprint $table) {
			$table->dropForeign('depenses_idCompterepartition_foreign');
			$table->dropForeign('depenses_idTypedepense_foreign');
		});
		Schema::drop('depenses');
	}

}
