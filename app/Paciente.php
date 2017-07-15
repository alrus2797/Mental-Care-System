<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    protected $table="paciente";
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
}
