<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagnostico extends Model
{
    protected $table = 'diagnosticos';

    public function fecha_creacion()
    {
    	$fecha_creacion = explode(" ", $this->attributes['created_at']);
    	return $fecha_creacion[0];
    }

    public function hora_creacion()
    {
    	$fecha_creacion = explode(" ", $this->attributes['created_at']);
    	return $fecha_creacion[1];
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function paciente()
    {
    	return $this->belongsTo('App\Paciente');
    }

    public function enfermedades()
    {
    	return $this->belongsToMany('App\Enfermedad');
    }

    public function sintomas()
    {
    	return $this->belongsToMany('App\Sintoma');
    }

}
