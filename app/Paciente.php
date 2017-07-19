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
        return $this->persona()->nombre_completo();
    }
}
