<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepartitionsTable extends Migration


	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('repartitions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('idAnnee')->unsigned();
            $table->foreign('idAnnee')->references('id')->on('anneeBudgetaires')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
			$table->integer('idProfile')->unsigned();
			$table->foreign('idProfile')->references('id')->on('profiles')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
			$table->integer('budgetInvestissement');
			$table->integer('budgetFonctionnement');
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
		Schema::table('repartitions', function(Blueprint $table) {
          
            $table->dropForeign('repartitions_idProfile_foreign');
            $table->dropForeign('repartitions_idAnnee_foreign');
        });
		Schema::drop('repartitions');
	}

}
