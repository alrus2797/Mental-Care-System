<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
  public function paciente()
  {
      return $this->hasOne('App\paciente');
  }

}
