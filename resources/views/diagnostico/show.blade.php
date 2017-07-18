@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-file-text"></i> Ver Diagnostico
                </div>
                <div class="panel-body">
                    <form action="{{route('diagnostico.index')}}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Paciente : </label>
                                    <div class="col-md-6" align="left">
                                        <h4>{{ $diagnostico->paciente->nombre_completo() }}</h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Edad : </label>
                                    <div class="col-md-6" align="left">
                                        <h4>{{ $diagnostico->paciente->edad() }} Años</h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Doctor : </label>
                                    <div class="col-md-6" align="left">
                                        <h4>{{ $diagnostico->user->name }}</h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Especialidad : </label>
                                    <div class="col-md-6" align="left">
                                        <h4>{{ $diagnostico->user->especialidad->nombre }}</h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Fecha : </label>
                                    <div class="col-md-6" align="left">
                                        <h4>{{ $diagnostico->fecha_creacion() }}</h4>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Hora : </label>
                                    <div class="col-md-6" align="left">
                                        <h4>{{ $diagnostico->hora_creacion() }}</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Sintomas : </label>
                                    <div class="col-md-6">
                                        @foreach($diagnostico->sintomas as $sintoma_lista)
                                            - {{ $sintoma_lista->nombre }}<br/>
                                        @endforeach
                                    </div>
                                </div>
                                <br/><br/>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Enfermedades : </label>
                                    <div class="col-md-6">
                                        @foreach($diagnostico->enfermedades as $enfermedad_lista)
                                            - {{ $enfermedad_lista->nombre }}<br/>
                                        @endforeach
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Recomendacion : </label>
                                    <div class="col-md-6" align="left">
                                        <p>{{ $diagnostico->recomendacion }}</p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Receta medica : </label>
                                    <div class="col-md-6" align="left">
{{--                                        <h4>{{ $diagnostico->receta }}</h4>--}}
                                        @foreach(explode(",",$diagnostico->receta) as $receta)
                                            - {{ $receta }}<br/>
                                        @endforeach
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-5 control-label">Debe retornar : </label>
                                    <div class="col-md-6" align="left">
                                        <h4>{{ $diagnostico->retorno }}</h4>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <!--div class="col-md-6" align="left">
                                    <button type="submit" class="btn btn-block btn-success">
                                        Imprimir
                                    </button>
                                </div-->
                                <div class="col-md-6" align="right">
                                    <a class="btn btn-default btn-block" href="{{url()->previous()}}">
                                        Volver
                                    </a>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
