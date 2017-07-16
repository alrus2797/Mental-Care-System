@extends('layouts.template')
@section('content')

<div class="row">
	<div class="col-lg-8 col-md-8 col xs-12">
		<h3>Lista de Citas <a href="citas/create"><button class="btn btn-primary"> Nueva Cita</button></a></h3><br>
		
		@include('citas.citas.search')
	<br>
	</div>

	<div class="col-lg-12 col-md-12 col xs-12">
		<div class="table-responsive">
			<table class="table table-responsive table-bordered table-condensed table-hover">
				<thead>
					<th>ID</th>
					<th>Motivo de Cita</th>
					<th>FECHA</th>
					<th>HORA</th>
					<th>Sintomas</th>
					<th>Observaciones</th>
					<th>Estado</th>
					<th>Pago</th>
					<th>Paciente</th>
					<th>Medico</th>
					<th>Opciones </th>
				</thead>	
			  <tbody>
			  	@foreach ($citas as $num)
			  	<tr>
			  		<td>{{$num->idcitas}}</td>
			  		<td>{{$num->asunto}}</td>
			  		<td>{{$num->fecha}}</td>
			  		<td>{{$num->hora}}</td>
			  		<td>{{$num->sintomas}}</td>
			  		<td>{{$num->observaciones}}</td>
			  		<td>{{$num->estado_cita_id_estado}}</td>	
			  		<td>{{$num->pago_cod_pago}}</td>
			  		<td>{{$num->paciente_idpaciente}}</td>
			  		<td>{{$num->medico_idmedico}}</td>
			  		<td><a href="{{URL::action('CitasController@edit',$num->idcitas)}}"><button class="btn btn-info">Editar</button></a>
			  		<a href="" data-target="#modal-delete-{{$num->idcitas}}" data-toggle="modal"><button class="btn btn-dager">Eliminar</button></a></td>
			  	</tr>

			  	@include('citas.citas.modal')
			  	@endforeach
				</tbody>
			</table>
		</div>
		{{$citas->render()}}
	</div>
</div>

@endsection 

