<?php

namespace App;

use DB;
use Storage;
use Illuminate\Database\Eloquent\Model;

class Sintoma extends Model
{
    protected $table = 'sintomas';

    public function enfermedades()
    {
    	return $this->belongsToMany('App\Enfermedad', 'enfermedad_sintomas', 'id', 'id');
    }

    public function categoria()
    {
        return $this->belongsTo('App\CategoriaSintoma');
    }

    public function diagnosticos()
    {
    	return $this->belongsToMany('App\Diagnostico', 'diagnostico_sintoma', 'id', 'id');
    }

    public function diagnosticosCount()
    {
        return DB::table('diagnostico_sintoma')->where('sintoma_id', '=', $this->id)->count();
    }

}
