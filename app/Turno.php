<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    protected $table = 'turnos';

    public function usuarios()
    {
    	return $this->hasMany('App\Usuario');
    }

}
