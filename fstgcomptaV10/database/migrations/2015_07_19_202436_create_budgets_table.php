<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('budgets', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('previsionnel');
			$table->integer('initial');
			$table->integer('modificatif');
			$table->integer('idAnnee')->unsigned();
            $table->foreign('idAnnee')->references('id')->on('anneebudgetaires')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
            $table->integer('idTypebudget')->unsigned();
            $table->foreign('idTypebudget')->references('id')->on('typebudgets')
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
		Schema::table('budgets', function(Blueprint $table) {
            $table->dropForeign('budgets_idAnnee_foreign');
            $table->dropForeign('budgets_idTypebudget_foreign');
        });
		Schema::drop('budgets');
	}

}
