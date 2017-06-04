<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class modeloPresentacion extends Model
{
    //
    
	public function presentaciones(){
    	return $this->hasMany('App\presentacion','id_modelo_presentacion','id');
    }	
}
