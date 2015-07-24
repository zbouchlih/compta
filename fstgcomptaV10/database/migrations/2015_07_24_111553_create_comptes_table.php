<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComptesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comptes', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('numero');
			$table->string('compte');
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
		Schema::table('comptes', function(Blueprint $table) {
           
            $table->dropForeign('comptes_idTypebudget_foreign');
        });
		Schema::drop('comptes');
	}

}
