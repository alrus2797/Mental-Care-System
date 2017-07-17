<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EspecialidadEnfermedad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('enfermedad', function($table) {
            $table->integer('especialidad_id')->unsigned()->nullable();
        });
        Schema::table('enfermedad', function($table) {
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
        Schema::table('enfermedad', function($table) {
            $table->dropColumn('especialidad_id')->unsigned()->nullable();
        });
    }
}
