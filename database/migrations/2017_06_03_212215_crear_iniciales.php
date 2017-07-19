<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearIniciales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      /*  DB::table('departamentos')->insert(
            array(
                'name' => 'AREQUIPA',
                'abreviatura' => 'AQP',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
            )
        );
        DB::table('departamentos')->insert(
            array(
                'name' => 'LIMA',
                'abreviatura' => 'LIMA',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
            )
        );
        DB::table('departamentos')->insert(
            array(
                'name' => 'CUZCO',
                'abreviatura' => 'CUZ',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
            )
        );*/
        DB::table('personas')->insert(
            array(
                'nombres'=> 'Alberto',
                'apellidopaterno'=> 'VIsa',
                'apellidoMaterno'=> 'FLores',
                'email' => 'admin@sistema.com',
                'sexo'  => 'M',
                'fechanacimiento'  => '1995-08-25',
                'direccion'  => 'QUETI IIII',
                'telefono'  => '999999999',
                'dni' => '10000000',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
            )
        );
        DB::table('users')->insert(
            array(
                'persona_id'=> 1,
                //'name' => 'Administrador',
                'email' => 'admin@sistema.com',
                'password' => bcrypt('root'),
                'tipo_usuario' => 'Administrador',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::table('users')->delete();
        DB::table('departamentos')->delete();
    }
}
