@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-plus-circle"></i> Nuevo Usuario</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('usuarios.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ ($errors->has('persona_id')) ? $errors->first('persona_id') : '' }}">
                            <label for="persona_id" class="col-md-4 control-label">Persona</label>
                            <div class="col-md-6">
                                <select class="form-control selectpicker" name="persona_id" id="persona_id" data-live-search="true">
                                    @foreach($personas as $paciente)
                                        <option value="{{$paciente->id}}">{{$paciente->nombre_completo()}}</option>
                                    @endforeach
                                </select>
                                {!! $errors->first('persona_id','<p class="help-block">:message</p>') !!}
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('departamento_id') ? ' has-error' : '' }}">
                            <label for="departamento_id" class="col-md-4 control-label">Departamento</label>
                            <div class="col-md-6">
                                <select id="departamento_id" name="departamento_id" class="form-control">
                                    @foreach($departamentos as $departamento)
                                    <option value="{{$departamento->id}}" {{ (old('departamento_id') == $departamento->id) ? 'selected':'' }} >
                                    {{$departamento->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('departamento_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('departamento_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('tipo_usuario') ? ' has-error' : '' }}">
                            <label for="tipo_usuario" class="col-md-4 control-label">Tipo usuario</label>
                            <div class="col-md-6">
                                <select id="tipo_usuario" name="tipo_usuario" class="form-control" onchange="evento_tipo_usuario()">
                                    <option value="Administrador" {{ (old('tipo_usuario') == 'Administrador') ? 'selected':'' }}>Administrador</option>
                                    <option value="Medico" {{ (old('tipo_usuario') == 'Medico') ? 'selected':'' }}>Medico</option>
                                </select>
                                @if ($errors->has('tipo_usuario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tipo_usuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('especialidad_id') ? ' has-error' : '' }}">
                            <label for="especialidad_id" class="col-md-4 control-label">Especialidad</label>
                            <div class="col-md-6">
                                <select id="especialidad_id" name="especialidad_id" class="form-control">
                                    @foreach($especialidades as $especialidad)
                                    <option value="{{$especialidad->id}}" {{ (old('especialidad_id') == $especialidad->id) ? 'selected':'' }} >
                                    {{$especialidad->nombre}}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('especialidad_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('especialidad_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('turno_id') ? ' has-error' : '' }}">
                            <label for="turno_id" class="col-md-4 control-label">Turno</label>
                            <div class="col-md-6">
                                <select id="turno_id" name="turno_id" class="form-control">
                                    @foreach($turnos as $turno)
                                    <option value="{{$turno->id}}" {{ (old('turno_id') == $turno->id) ? 'selected':'' }} >
                                    {{$turno->nombre}}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('turno_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('turno_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="col-md-6" align="left">
                                    <button type="submit" class="btn btn-block btn-primary">
                                        Registrar
                                    </button>
                                </div>
                                <div class="col-md-6" align="right">
                                    <a class="btn btn-default btn-block" href="{{url()->previous()}}">
                                        Cancelar
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

<script type="text/javascript">
    function evento_tipo_usuario(){
        var val = document.getElementById('tipo_usuario').value;
        if (val == "Administrador") {
            document.getElementById('especialidad_id').disabled = true;
            document.getElementById('turno_id').disabled = true;
        }else{
            document.getElementById('especialidad_id').disabled = false;
            document.getElementById('turno_id').disabled = false;
        }
    }
    document.addEventListener('DOMContentLoaded', function() {
        evento_tipo_usuario();
    }, false);

</script>