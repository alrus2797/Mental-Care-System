<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Doctores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('tipo_usuario')->nullable();
            $table->integer('turno_id')->unsigned()->nullable();
            $table->integer('especialidad_id')->unsigned()->nullable();
        });
        Schema::table('users', function($table) {
            $table->foreign('turno_id')->references('id')->on('turnos');
            $table->foreign('especialidad_id')->references('id')->on('especialidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign(['turno_id']);
            $table->dropForeign(['especialidad_id']);
            $table->dropColumn('tipo_usuario');
            $table->dropColumn('turno_id');
            $table->dropColumn('especialidad_id');
        });
    }
}
