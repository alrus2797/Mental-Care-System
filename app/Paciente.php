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

<<<<<<< HEAD
    public function nombre_completo()
    {
        return $this->persona()->nombre_completo();
    }
=======
    public function prescripciones()
    {
      return $this->hasMany('App\Prescription');
    }
    public function componentes()
    {
      return $this->belongsToMany('App\Componente','alergias');
    }

>>>>>>> b06999d56ad3a1f7d2f8dde63c86875ef6ef3c13
}
