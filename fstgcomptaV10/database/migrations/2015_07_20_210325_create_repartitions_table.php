<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRepartitionsTable extends Migration
{

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
			$table->integer('idBudget')->unsigned();
            $table->foreign('idBudget')->references('id')->on('budgets')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
			$table->integer('idProfile')->unsigned();
			$table->foreign('idProfile')->references('id')->on('profiles')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
			$table->integer('budget');
			
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
            $table->dropForeign('repartitions_idBudget_foreign');
        });
		Schema::drop('repartitions');
	}

}
