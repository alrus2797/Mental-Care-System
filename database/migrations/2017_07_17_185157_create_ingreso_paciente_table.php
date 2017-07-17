<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIngresoPacienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('ingreso_paciente', function (Blueprint $table) {
        //$table->increments('id');
        $table->integer("paciente_id")->unsigned();
        $table->foreign("paciente_id")->references("id")->on("pacientes");
        $table->integer("ingreso_id")->unsigned();
        $table->foreign("ingreso_id")->references("id")->on("ingresos");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
