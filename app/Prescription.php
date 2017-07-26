<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prescription extends Model
{
    //
    public function medicina()
    {
      return $this->belongsToMany('App\Medicina');
    }
    public function medico()
    {
      return $this->belongsTo('App\User');
    }
    public function paciente()
    {
      return $this->belongsTo('App\Paciente');
    }
}
