<?php

namespace App;

use DB;
use Illuminate\Database\Eloquent\Model;

class Enfermedad extends Model
{
    protected $table = 'enfermedad';

    public function sintomas()
    {
    	return $this->belongsToMany('App\Sintoma');
    }

    public function especialidad()
    {
        return $this->belongsTo('App\Especialidad');
    }

    public function diagnosticos()
    {
    	return $this->belongsToMany('App\Diagnostico', 'diagnostico_enfermedad', 'enfermedad_id', 'diagnostico_id');
    }

    public function diagnosticosCount()
    {
        return DB::table('diagnostico_enfermedad')->where('enfermedad_id', '=', $this->id)->count();
    }

}
