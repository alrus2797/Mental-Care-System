@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-plus-circle"></i> Nuevo Paciente</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('paciente.store') }}" name="formulario_paciente">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre(s)</label>

                            <div class="col-md-6">
                                <input id="nombre" type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^A-Za-z ]/g,'');"  name="nombre" value="{{ old('nombre') }}" required autofocus>

                                @if ($errors->has('nombre'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nombre') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('paterno') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Apellido paterno</label>

                            <div class="col-md-6">
                                <input id="paterno" type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^A-Za-z ]/g,'');"  name="paterno" value="{{ old('paterno') }}" required>

                                @if ($errors->has('paterno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('paterno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('materno') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Apellido materno</label>

                            <div class="col-md-6">
                                <input id="materno" type="text" class="form-control" onkeyup="this.value=this.value.replace(/[^A-Za-z ]/g,'');"  name="materno" value="{{ old('materno') }}">

                                @if ($errors->has('materno'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('materno') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('alergias') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Receta medica</label>
                            <div class="col-md-6" id="alergias" >
                                <input type="text" id="alergia1" name="alergia[]" class="form-control" placeholder="Ingresa una alergia" required>
                                @if ($errors->has('alergias'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('alergias') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <button id="remove-alergia" class="btn btn-danger pull-right">
                                <i class="fa fa-minus-square"></i> Quitar Alergia
                            </button>
                            <button id="add-alergia" class="btn btn-info pull-right">
                                <i class="fa fa-plus-square"></i> Añadir Alergia
                            </button>
                        </div>
                        <div class="form-group{{ $errors->has('documento') ? ' has-error' : '' }}">
                            <label for="documento" class="col-md-4 control-label">DNI</label>

                            <div class="col-md-6">
                                <input id="documento" type="text" class="form-control" name="documento" value="{{ old('documento') }}" onkeypress="return isNumber(event)" required>

                                @if ($errors->has('documento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('documento') }}</strong>
                                    </span>
                                @endif
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

                        <div class="form-group{{ $errors->has('nacimiento') ? ' has-error' : '' }}">
                            <label for="carnet" class="col-md-4 control-label">Fecha de nacimiento</label>

                            <div class="col-md-6">
                                <input id="nacimiento" type="date" class="form-control" name="nacimiento" value="{{ old('nacimiento') }}" required>

                                @if ($errors->has('nacimiento'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nacimiento') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('direccion') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Direccion</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text" class="form-control" name="direccion" value="{{ old('direccion') }}">

                                @if ($errors->has('direccion'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('direccion') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('telefono') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Telefono</label>

                            <div class="col-md-6">
                                <input id="telefono" type="text" class="form-control" name="telefono" value="{{ old('telefono') }}">

                                @if ($errors->has('telefono'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('telefono') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('celular') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Celular</label>

                            <div class="col-md-6">
                                <input id="celular" type="text" class="form-control" name="celular" value="{{ old('celular') }}">

                                @if ($errors->has('celular'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('celular') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('autodanio') ? ' has-error' : '' }}">
                            <label for="autodanio" class="col-md-4 control-label">AUTO DAÑO</label>

                            <div class="col-md-6">
                                <input id="autodanio" type="checkbox" class="form-control" name="autodanio" value="{{ old('autodanio') }}" required>

                                @if ($errors->has('autodanio'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('autodanio') }}</strong>
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

<script type="text/javascript">
    function isNumber(evt) {
        if(document.getElementById('documento').value.length < 8){
            evt = (evt) ? evt : window.event;
            var charCode = (evt.which) ? evt.which : evt.keyCode;
            if (charCode > 31 && (charCode < 48 || charCode > 57)) {
                return false;
            }
            return true;
        }else{
            return true;
        }
    }

    $(function () {
        var alergiasCount =document.formulario_paciente.elements['alergia[]'].length;

        var addAlergia = function () {
            var alergiaDiv = document.getElementById('alergias');
            var newWidget = document.createElement("input");
            newWidget.setAttribute('class','form-control');
            newWidget.setAttribute('name','alergia[]');
            newWidget.setAttribute('id','alergia'+toString(alergiasCount));
            newWidget.setAttribute('placeholder',"Ingresa una alergia");
            alergiasCount++;

            $(newWidget).appendTo(alergiaDiv);
        };

        var removeAlergia = function () {
            if (alergiasCount < 1) return;

            var alergiasDiv = document.getElementById('alergias');
            var ultimaAlergia = alergiasDiv.removeChild(alergiasDiv.lastElementChild);

            ultimaAlergia.remove();

            alergiasCount--;
        };
        if (alergiasCount === 0) addAlergia();
        $('#add-alergia').click(function (e) {
            e.preventDefault();
            addAlergia();
        });

        $('#remove-alergia').click(function (e) {
            e.preventDefault();
            removeAlergia();
        });

    });

</script>
@endsection


{!! Html::script('js/jquery.min.js') !!}

{!! Html::script('js/bootstrap-select.min.js') !!}
