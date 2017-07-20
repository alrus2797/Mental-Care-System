<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';

    public function usuarios()
    {
    	return $this->hasMany('App\User');
    }

    public function pacientes()
    {
    	return $this->hasMany('App\Paciente');
    }

}
