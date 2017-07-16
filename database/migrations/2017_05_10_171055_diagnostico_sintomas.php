<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DiagnosticoSintomas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostico_sintoma', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('sintoma_id')->unsigned();
            $table->foreign('sintoma_id')->references('id')->on('sintomas');
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
        Schema::table('diagnostico_sintoma', function (Blueprint $table) {
            $table->dropForeign(['sintoma_id']);
            $table->dropForeign(['diagnostico_id']);
        });

        Schema::dropIfExists('diagnostico_sintoma');
    }
}
