<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class componentes-medicamento extends Model
{
    //
    protected $table = 'pacientes';

    public function historial()
    {
        return $this->hasOne('App\Historial');
    }

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }


}
