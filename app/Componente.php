<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Componente extends Model
{
    //
    public function medicamentos()
    {
      $this->belongsToMany('App\Medicamento');
    }
}
