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
                    <form class="form-horizontal" role="form" method="POST" action="{{route('departamento.update',$departamento->id)}}">
                        <input name="_method" type="hidden" value="PATCH">
						{{ csrf_field() }}

						<div class="form-group{{ ($errors->has('departamento_name')) ? $errors->first('departamento_name') : '' }}">
                            <label for="departamento_name" class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
    							<input type="text" id="departamento_name" name="departamento_name" class="form-control" placeholder="Ingresa el nombre aqui" value="{{$departamento->name}}" autofocus>
    							{!! $errors->first('departamento_name','<p class="help-block">:message</p>') !!}
                            </div>
						</div>

                        <div class="form-group{{ ($errors->has('abreviatura')) ? $errors->first('abreviatura') : '' }}">
                            <label for="departamento_name" class="col-md-4 control-label">Abreviatura</label>
                            <div class="col-md-6">
                                <input type="text" id="abreviatura" name="abreviatura" class="form-control" placeholder="Ingresa la breviatura aqui" value="{{$departamento->abreviatura}}">
                                {!! $errors->first('abreviatura','<p class="help-block">:message</p>') !!}
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