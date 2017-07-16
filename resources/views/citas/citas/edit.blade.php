@extends('layouts.template')
@section('content')

<div class="row">
	<div class="col-lg-8 col-md-8 col xs-12">
		<h3>Editar Cita: {{ $citas->idcitas}}</h3>
		
		@if (count($errors)>0)
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{$error}}</li>
				@endforeach
			</ul>
		</div>
		@endif
	</div>
</div>

	{!!Form::model($citas,['method'=>'PATCH','route'=>['citas.update',$citas->idcitas]])!!}
	{{Form::token()}}
		<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="asunto">Asunto</label>
				<input type="text" name="asunto" class="form-control" value="{{$citas->asunto}}">
			</div>
			<div class="form-group">
			<label for="fecha">Fecha</label>
				<input type="text" name="fecha" class="form-control" value="{{$citas->fecha}}">
			</div>
			<div class="form-group">
				<label for="hora">Hora</label>
				<input type="text" name="hora" class="form-control" value="{{$citas->hora}}">
			</div>
			<div class="form-group">
				<label for="sintomas">Sintomas</label>
				<input type="text" name="sintomas" class="form-control" value="{{$citas->sintomas}}">
			</div>
			<div class="form-group">
				<label for="observaciones">Observaciones</label>
				<input type="text" name="observaciones" class="form-control" value="{{$citas->observaciones}}">
			</div>
			<div class="form-group">
				<label for="estado_cita_id_estado">estado_cita_id_estado</label>
				<input type="text" name="estado_cita_id_estado" class="form-control" value="{{$citas->estado_cita_id_estado}}">
			</div>
			<div class="form-group">
				<label for="pago_cod_pago">pago_cod_pago</label>
				<input type="text" name="pago_cod_pago" class="form-control" value="{{$citas->pago_cod_pago}}">
			</div>
			<div class="form-group">
				<label for="paciente_idpaciente">paciente_idpaciente</label>
				<input type="text" name="paciente_idpaciente" class="form-control" value="{{$citas->paciente_idpaciente}}">
			</div>
			<div class="form-group">
				<label for="medico_idmedico">medico_idmedico</label>
				<input type="text" name="medico_idmedico" class="form-control" value="{{$citas->medico_idmedico}}">
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">GUARDAR CITA</button>
				<button class="btn btn-danger" type="reset">CANCELAR</button>
			</div>
		</div>
	</div>
	{!!Form::close()!!}	
@endsection 

