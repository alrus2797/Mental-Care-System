<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class medicamento extends Model
{
    //
    public function presentaciones(){
    	return $this->hasMany('App\presentacion','id_medicamento','id');
    }	
}

