@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-address-book"></i> Datos personales del paciente
                </div>
                <div class="panel-body">
                    <div class="col-md-2 col-md-offset-1" style="vertical-align: center;">
                        <br/><i class="fa fa-address-card fa-5x"></i>
                    </div>
                    <div class="col-md-4">
                        <label class="control-label">Nombre completo : </label>{{ $paciente->nombre_completo() }}<br/>
                        <label class="control-label">DNI: </label>{{ $paciente->documento }}<br/>
                        <label class="control-label">Departamento : </label>{{ $paciente->departamento->name }}<br/>
                        <label class="control-label">Fecha de nacimiento : </label>{{ $paciente->nacimiento }}<br/>
                        <label class="control-label">Edad : </label>{{ $paciente->edad() }} años<br/>
                    </div>
                    <div class="col-md-4 col-md-offset-1">
                        <label class="control-label">Direccion : </label>@if(isset($paciente->direccion)) {{ $paciente->direccion }} @else - @endif<br/>
                        <label class="control-label">Telefono : </label>@if(isset($paciente->telefono)) {{ $paciente->telefono }} @else - @endif<br/>
                        <label class="control-label">Celular : </label>@if(isset($paciente->celular)) {{ $paciente->telefono }} @else - @endif<br/>
                        <label class="control-label">Ultima visita : </label>@if($paciente->ultima_visita()->count()>0) @foreach($paciente->ultima_visita() as $ultima) {{$ultima->updated_at}} @endforeach @else Primera visita @endif<br/>
                        <label class="control-label">Registro : </label>@if(isset($paciente->created_at)) {{ $paciente->creacion() }} @else - @endif<br/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-md-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-file-text"></i> Historial medico
                </div>
                <div class="panel-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Medico</th>
                                <th width="10%">Fecha y Hora</th>
                                <th width="20%">Sintomas</th>
                                <th width="15%">Diagnostico</th>
                                <th>Recomendaciones</th>
                                <th>Ver</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $num = 1; ?>
                            @foreach($paciente->diagnosticos as $diagnostico)
                                <tr>
                                    <td>{{$num++}}</td>
                                    <td>{{$diagnostico->user->name}}<br/>{{$diagnostico->user->especialidad->nombre}}</td>
                                    <td>{{$diagnostico->fecha_creacion()}}<br/>{{$diagnostico->hora_creacion()}}</td>
                                    <td>
                                        <?php $aux = 0; ?>
                                        @foreach($diagnostico->sintomas as $sintoma_lista)
                                        {{ $sintoma_lista->nombre }}
                                        <?php $aux++; ?>
                                        @if($aux<$diagnostico->sintomas->count()) , @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        @foreach($diagnostico->enfermedades as $enfermedad_lista)
                                            - {{ $enfermedad_lista->nombre }}<br/>
                                        @endforeach
                                    </td>
                                    <td>
                                        <p>{{ $diagnostico->recomendacion }}</p>
                                    </td>
                                    <td>
                                        <a href="{{route('diagnostico.show',$diagnostico->id)}}" class="btn btn-success"><i class="fa fa-file-text"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
