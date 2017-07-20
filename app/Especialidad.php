<?php

namespace App;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Especialidad extends BaseModel
{
    protected $table = 'especialidades';

    public function enfermedades()
    {
    	return $this->hasMany('App\Enfermedad');
    }

}
