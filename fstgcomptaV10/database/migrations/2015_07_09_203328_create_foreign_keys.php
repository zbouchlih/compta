<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

    public function up()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->foreign('idProfile')->references('id')->on('profiles')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
    }

    public function down()
    {
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign('users_idProfile_foreign');
        });
    }
}