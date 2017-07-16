<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PacienteFormRequest extends FormRequest
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
            'apellidos'=>'max:50',
            'genero'=>'max:50',
            'direccion'=>'max:50', 
            'telefono'=>'numeric',
            'email'=>'max:50',
        ];
    }
}
