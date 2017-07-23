<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    //
    public function medicamentos()
    {
      return $this->belongsToMany('App\Medicamento');
    }

    public function alergias()
    {
      return $this->belongsToMany('App\Paciente');
    }
}
