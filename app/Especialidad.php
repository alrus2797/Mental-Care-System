<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    protected $table = 'especialidades';

    public function enfermedades()
    {
    	return $this->hasMany('App\Enfermedad');
    }

}
