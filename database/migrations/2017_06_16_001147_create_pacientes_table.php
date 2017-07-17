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
            /*$table->integer('persona_id')->unsigned();
            $table->foreign('persona_id')->references('id')->on('personas');

            $table->integer('historials_id')->unsigned();
            //$table->increments('historials_id');
            $table->foreign('historials_id')->references('id')->on('historials');

            //Los estados pueden ser si se encuentra internado, recien ingresado, o ya dado de alta
            $table->integer('estado_id')->unsigned();
            $table->foreign('estado_id')->references('id')->on('pacientes_estados');
*/


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
