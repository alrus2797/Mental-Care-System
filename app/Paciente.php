<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table="pacientes";
    protected $primaryKey='id';

    public $timestamps=false;

    protected $fillable =[
    	'nombre',
    	'apellidos',
        'genero',
    	'direccion',
        'telefono',
        'email',
    ];

    protected $guarded=[

    ];

    public function persona()
    {
        return $this->belongsTo('App\Persona');
    }

    public function nombre_completo()
    {
        return $this->persona->nombre_completo();
    }

    public function prescripciones()
    {
      return $this->hasMany('App\Prescription');
    }
    public function componentes()
    {
      return $this->belongsToMany('App\Componente','alergias');
    }
    public function telefonos()
{
    if($this->persona()->telefono){
        return $this->persona()->telefono;
    }else{
        return 'Sin telefono';
    }
}

    public function edad()
    {
        return date_diff(date_create($this->persona->fechanacimiento), date_create('now'))->y;
    }

    public function ultima_visita()
    {
        $diagnosticos = DB::table('diagnosticos')->where('paciente_id', '=', $this->id)->orderBy('created_at', 'desc')->take(1)->get();
        return $diagnosticos;

    }

    public function creacion()
    {
        $aux_date = explode(" ", $this->persona->fechanacimiento);
        return $aux_date[0];
    }

    public function diagnosticos()
    {
        return $this->hasMany('App\Diagnostico');
    }


}
