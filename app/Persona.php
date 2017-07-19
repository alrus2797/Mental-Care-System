<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  public function paciente()
  {
      return $this->hasOne('App\Paciente');
  }



    public function nombre_completo()
    {
        return $this->attributes['nombres']." ".$this->attributes['apellidopaterno']." ".$this->attributes['apellidomaterno'];
    }
}
