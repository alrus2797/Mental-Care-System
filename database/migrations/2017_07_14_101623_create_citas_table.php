<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('asunto',100);
            $table->dateTime('fecha_hora');
            $table->string('sintomas',100);
            $table->string('observaciones',100)->nullable();
            $table->integer('estado_cita_id_estado')->unsigned();
            $table->foreign('estado_cita_id_estado')->references('id')->on('estado_cita');
            $table->integer('pago_cod_pago',10)->unsigned()->nullable();
            $table->integer('pago_cod_pago',10)->references('id')->on('pago');
            $table->integer('paciente_idpaciente')->unsigned()->nullable();
            $table->foreign('paciente_idpaciente')->references('id')->on('paciente');
            $table->integer('medico_idmedico')->unsigned()->nullable();
            $table->foreign('medico_idmedico')->references('id')->on('medico');
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
        Schema::dropIfExists('citas');
    }
}
