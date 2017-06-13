<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePacientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paciente', function (Blueprint $table) {
            $table->increments('id');
            $table->string('apellidoPaterno',100);
            $table->string('apellidoMaterno',100);
            $table->string('nombres',100);
            $table->string('tipoDocumento',20);
            $table->string('documento',20);
            $table->date('fechaNacimiento');
            $table->string('sexo',1);
            $table->string('estadoCivil',1);
            $table->date('fechaIngreso');
            $table->string('direccion');
            $table->string('telefono',20);
            $table->string('celular1',20);
            $table->string('celular2',20);
            $table->unique('tipoDocumento','documento');
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
        Schema::dropIfExists('pacientes');
    }
}
