<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CitasFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'asunto'=>'max:50',
            'fecha'=>'max:10',
            'hora'=>'max:6',
            'sintomas'=>'max:50',
            'observaciones'=>'max:100',
            'estado_cita_id_estado'=>'max:11',
            'pago_cod_pago'=>'max:11',
            'paciente_idpaciente'=>'max:11',
            'medico_idmedico'=>'max:11',
        ];
    }
}
