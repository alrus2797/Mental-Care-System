@extends('layouts.template')
@section('content')
    <center><div class="row">
        @if($paciente)
            Mostrar PACIENTE N° {{$paciente->id}}<br>
            Nombres {{$paciente->nombres}}<br>
            Apellido Pateeno {{$paciente->apellidoPaterno}}<br>
            APellido Materno {{$paciente->apellidoMaterno}}<br>
            Nombres {{$paciente->nombres}}<br>
            Sexo {{$paciente->sexo}}<br>
            Estado Civil {{$paciente->estadoCivil}}<br>
            Grado Educativo {{$paciente->grado}}<br>
            Dirección {{$paciente->direccion}}<br>
            Telefono {{$paciente->telefono}}<br>
            Celular1 {{$paciente->celular1}}<br>
            Celular2 {{$paciente->celular2}}<br>
        @else
            PACIENTE NO ENCONTRADO
        @endif
    </div>
    </center>
@endsection