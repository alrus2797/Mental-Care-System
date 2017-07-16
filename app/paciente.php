<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    //
    protected $table = 'pacientes';

    public function historial()
    {
        return $this->hasOne('App\Historial');
    }

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }


}
