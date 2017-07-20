@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<i class="fa fa-edit"></i> Editar Departamento
                </div>

                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{route('turnos.update',$turno->id)}}">
                        <input name="_method" type="hidden" value="PATCH">
						{{ csrf_field() }}

						<div class="form-group{{ ($errors->has('turno_name')) ? $errors->first('turno_name') : '' }}">
                            <label for="turno_name" class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
    							<input type="text" id="turno_name" name="turno_name" class="form-control" placeholder="Ingresa el nombre aqui" value="{{$turno->nombre}}" autofocus>
    							{!! $errors->first('turno_name','<p class="help-block">:message</p>') !!}
                            </div>
						</div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="col-md-6" align="left">
                                    <button type="submit" class="btn btn-block btn-warning">
                                        Editar
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