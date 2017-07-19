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
        Schema::create('pacientes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('persona_id')->unsigned();
            $table->foreign('persona_id')->references('id')->on('personas');

<<<<<<< HEAD:database/migrations/2017_04_16_001147_create_pacientes_table.php
=======
            //$table->integer('historials_id')->unsigned();
            //$table->increments('historials_id');
            //ç$table->foreign('historials_id')->references('id')->on('historials');
>>>>>>> b06999d56ad3a1f7d2f8dde63c86875ef6ef3c13:database/migrations/2017_06_16_001147_create_pacientes_table.php

            //Los estados pueden ser si se encuentra internado, recien ingresado, o ya dado de alta
            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('pacientes_estados');

            $table->integer('departamento_id')->unsigned();
            $table->foreign('departamento_id')->references('id')->on('departamentos');

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
