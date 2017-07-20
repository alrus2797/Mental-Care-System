<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alergia extends Model
{
    //
    public function alergias()
    {
      return $this->belongsToMany('App\Paciente');
    }
}
