<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetFonctionnementsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('budgetFonctionnements', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('previsionnel');
			$table->integer('initial');
			$table->integer('modificatif');
			$table->integer('idAnnee')->unsigned();
            $table->foreign('idAnnee')->references('id')->on('anneeBudgetaires')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
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
		Schema::table('budgetFonctionnements', function(Blueprint $table) {
            $table->dropForeign('budgetFonctionnements_idAnnee_foreign');
        });
		Schema::drop('budgetFonctionnements');
	}

}
