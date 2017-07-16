<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table = 'pacientes';
	
	public function departamento()
    {
        return $this->belongsTo('App\Departamento');
    }

    public function nombre_completo()
    {
    	return $this->attributes['nombre']." ".$this->attributes['paterno']." ".$this->attributes['materno'];
    }

    public function telefonos()
    {
    	if((isset($this->attributes['telefono']))&&(isset($this->attributes['celular']))){
    		return $this->attributes['telefono']."-".$this->attributes['celular'];
    	}else if(isset($this->attributes['telefono'])){
			return $this->attributes['telefono'];
    	}else if(isset($this->attributes['celular'])){
			return $this->attributes['celular'];
    	}else{
			return 'Sin telefono';
    	}
    }

    public function edad()
    {
    	return date_diff(date_create($this->attributes['nacimiento']), date_create('now'))->y;
    }

    public function ultima_visita()
    {
         $diagnosticos = DB::table('diagnosticos')->where('paciente_id', '=', $this->id)->orderBy('created_at', 'desc')->take(1)->get();
         return $diagnosticos;

    }

    public function creacion()
    {
        $aux_date = explode(" ", $this->attributes['nacimiento']);
        return $aux_date[0];
    }

    public function diagnosticos()
    {
        return $this->hasMany('App\Diagnostico');
    }

}
