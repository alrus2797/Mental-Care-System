@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-key"></i> Actualizar contraseña</div>
                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{ route('updatepass',$user->id) }}">
                        <input name="_method" type="hidden" value="PATCH">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Nombre completo</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" placeholder="Ingresa el nombre aqui" value="{{$user->name}}" disabled="true">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('carnet') ? ' has-error' : '' }}">
                            <label for="carnet" class="col-md-4 control-label">Carnet de identidad</label>

                            <div class="col-md-6">
                                <input id="carnet" type="text" class="form-control" name="carnet" placeholder="Ingresa el carnet de identidad aqui" value="{{$user->carnet}}" disabled="true">

                                @if ($errors->has('carnet'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('carnet') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('departamento_id') ? ' has-error' : '' }}">
                            <label for="departamento_id" class="col-md-4 control-label">Departamento</label>
                            <div class="col-md-6">
                                <select id="departamento_id" name="departamento_id" class="form-control" disabled="true">>
                                    @foreach($departamentos as $departamento)
                                    <option value="{{$departamento->id}}" {{ ($user->departamento_id == $departamento->id) ? 'selected':'' }} >
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

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Correo electronico</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" placeholder="Ingresa el email aqui" value="{{$user->email}}" disabled="true">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Contraseña</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmar Contraseña</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="col-md-6" align="left">
                                    <button type="submit" class="btn btn-block btn-warning">
                                        Actualizar Contraseña
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