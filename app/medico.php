<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    //
    public function prescription(){
      return $this->hasMany('App\Prescription');
    }
}
