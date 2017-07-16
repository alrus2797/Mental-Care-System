<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHorarioMedicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('horario_medicos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('medicos_id')->unsigned()->nullable();
            $table->foreign('medicos_id')->references('id')->on('personas');
            $table->integer('dias_id')->unsigned()->nullable();
            $table->foreign('dias_id')->references('id')->on('dias');
            $table->integer('slots_id')->unsigned()->nullable();
            $table->foreign('slots_id')->references('id')->on('slots');
            $table->string('estado',25);
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
        Schema::dropIfExists('horario_medicos');
    }
}
