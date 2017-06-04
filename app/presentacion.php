<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class presentacion extends Model
{
    //
    public function medicamento(){
        return $this->belongsTo('App\medicamento','id_medicamento', 'id');
    }

    public function modeloPresentacion(){
        return $this->belongsTo('App\modeloPresentacion','id_modelo_presentacion', 'id');
    }
}
