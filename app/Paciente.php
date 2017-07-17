<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table="pacientes";
    protected $primaryKey='idpaciente';

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

}