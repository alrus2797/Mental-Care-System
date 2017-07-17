<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearDeparametrosIniciales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('departamentos')->insert(
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
        );
        DB::table('users')->insert(
            array(
                'name' => 'Administrador',
                'email' => 'admin@sistema.com',
                'password' => bcrypt('root'),
                'documento' => '10000000',
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
