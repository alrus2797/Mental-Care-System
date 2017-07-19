@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-lg-8 col-md-8 col xs-12">
		<h3 class="text-center">Nueva Cita</h3>
		
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
	



	{!!Form::open(array('url'=>'citas/citas','method'=>'POST','autocomplete'=>'off'))!!}
	{{Form::token()}}
	<div class="row">
		<div class="col-lg -6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<label for="asunto">Motivos de la Cita</label>
				<input type="text" name="asunto" class="form-control" placeholder="asunto...">
			</div>
			<div class="form-group">
				<label for="fecha">Fecha</label>
				<input type="text" name="fecha" class="form-control" placeholder="fecha...">
			</div>
			<div class="form-group">
				<label for="hora">Hora</label>
				<input type="text" name="hora" class="form-control" placeholder="hora...">
			</div>
			<div class="form-group">
				<label for="sintomas">Sintomas</label>
				<input type="text" name="sintomas" class="form-control" placeholder="sintomas...">
			</div>

			<div class="form-group">
				<label for="observaciones">Observaciones</label>
				<input type="text" name="observaciones" class="form-control" placeholder="observaciones...">
			</div>
			<div class="form-group">
				<label for="estado_cita_id_estado">estado_cita_id_estado</label>
				<input type="text" name="estado_cita_id_estado" class="form-control" placeholder="estado_cita_id_estado...">
			</div>
			<div class="form-group">
				<label for="pago_cod_pago">pago_cod_pago</label>
				<input type="text" name="pago_cod_pago" class="form-control" placeholder="pago_cod_pagos...">
			</div>
			<div class="form-group">
				<label for="paciente_idpaciente">paciente_idpaciente</label>
				<input type="text" name="paciente_idpaciente" class="form-control" placeholder="paciente_idpaciente...">
			</div>
			<div class="form-group">
				<label for="medico_idmedico">medico_idmedico</label>
				<input type="text" name="medico_idmedico" class="form-control" placeholder="medico_idmedico...">
			</div>

			<div class="form-group">
				<button class="btn btn-primary" type="submit">GUARDAR CITA</button>
				<button class="btn btn-danger" type="reset">CANCELAR</button>
			</div>
		</div>
	</div>
	{!!Form::close()!!}
@endsection 

