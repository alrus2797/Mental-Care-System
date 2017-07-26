<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Componente;
use App\Presentacion;

class CrearIniciales extends Migration
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
        DB::table('personas')->insert(
            array(
                'nombres'=> 'Alexis',
                'apellidopaterno'=> 'Mendoza',
                'apellidoMaterno'=> 'Vasdas',
                'email' => 'tex@mail.com',
                'sexo'  => 'M',
                'fechanacimiento'  => '1997-06-02',
                'direccion'  => 'QUETI I',
                'telefono'  => '451166',
                'dni' => '12345678',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
            )
        );
        DB::table('users')->insert(
            array(
                'persona_id'=> 2,
                'email' => 'tex@mail.com',
                'password' => bcrypt('secret'),
                'tipo_usuario' => 'Medico',
                'created_at' => date('Y-m-d h:i:s'),
                'updated_at' => date('Y-m-d h:i:s')
            )
        );
        DB::table('personas')->insert(
            array(
                'nombres'=> 'Alexander',
                'apellidopaterno'=> 'Apaza',
                'apellidoMaterno'=> 'Torres',
                'email' => 'alrus2797@sistema.com',
                'sexo'  => 'M',
                'fechanacimiento'  => '1997-06-02',
                'direccion'  => 'QUETI III',
                'telefono'  => '921344415',
                'dni' => '77036017',
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
