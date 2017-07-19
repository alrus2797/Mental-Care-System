<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ActualizarUsuario010317 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->integer('departamento_id')->unsigned();
            $table->integer('persona_id')->unsigned();
        });
        Schema::table('users', function($table) {
            $table->foreign('departamento_id')->references('id')->on('departamentos');
            $table->foreign('persona_id')->references('id')->on('personas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('departamento_id');
        });
    }
}
