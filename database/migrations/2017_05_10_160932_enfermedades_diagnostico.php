<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EnfermedadesDiagnostico extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostico_enfermedad', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('enfermedad_id')->unsigned();
            $table->foreign('enfermedad_id')->references('id')->on('enfermedad');
            $table->integer('diagnostico_id')->unsigned();
            $table->foreign('diagnostico_id')->references('id')->on('diagnosticos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('diagnostico_enfermedad', function (Blueprint $table) {
            $table->dropForeign(['enfermedad_id']);
            $table->dropForeign(['diagnostico_id']);
        });

        Schema::dropIfExists('diagnostico_enfermedad');
    }
}
