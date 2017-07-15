<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    protected $table="citas";
    protected $primaryKey='idcitas';
    
    public $timestamps=false;

    protected $fillable =[
    	'asunto',
    	'fecha',
        'hora',
    	'sintomas', 
        'observaciones',
        'estado_cita_id_estado',
        'pago_cod_pago',
        'paciente_idpaciente',
        'medico_idmedico',
    ];

    protected $guarded=[

    ]; 
}
