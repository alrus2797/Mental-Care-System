<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{

  public function personas()
  {
    return $this->belongsTo('App\Persona');
  }
}
