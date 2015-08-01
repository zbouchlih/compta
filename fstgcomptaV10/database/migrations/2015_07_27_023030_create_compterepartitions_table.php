<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompterepartitionsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compte_repartition', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('repartition_id')->unsigned();
			$table->foreign('repartition_id')->references('id')->on('repartitions')
						->onDelete('restrict')
						->onUpdate('restrict');
			$table->integer('compte_id')->unsigned();
			$table->foreign('compte_id')->references('id')->on('comptes')
						->onDelete('restrict')
						->onUpdate('restrict');
			$table->integer('credit_ouvert');
			$table->integer('engagement');
			$table->integer('paiement');
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
		Schema::table('compte_repartition', function(Blueprint $table) {
			$table->dropForeign('compte_repartition_compte_id_foreign');
			$table->dropForeign('compte_repartition_repartition_id_foreign');
		});
		Schema::drop('compte_repartition');
	}

}
