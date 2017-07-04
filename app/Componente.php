<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    //
    pulic function medicamentos()
    {
      $this->belongsToMany('App\Medicamento');
    }
}
