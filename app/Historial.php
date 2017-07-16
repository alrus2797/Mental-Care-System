<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    //

    public function paciente()
    {
        return $this->belongsTo('App\paciente');
    }

}
