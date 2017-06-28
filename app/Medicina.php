<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Medicina extends Model
{
    public function medicamento()
    {
    	return $this->belongsTo('App\Medicamento');
    }
    public function presentacion()
    {
    	return $this->belongsTo('App\Presentacion');
    }
}
