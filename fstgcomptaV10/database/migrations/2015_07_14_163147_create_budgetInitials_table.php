<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBudgetInitialsTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('budgetInitials', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('budget');
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
		Schema::table('budgetInitials', function(Blueprint $table) {
            $table->dropForeign('budgetInitials_idAnnee_foreign');
        });
		Schema::drop('budgetInitials');
	}

}
