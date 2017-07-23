@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-lg-8 col-md-8 col xs-12">
		<h3>Listado de Pacientes <a href="paciente/create"><button class="btn btn-primary"> Nuevo Paciente</button></a></h3><br>
		
		@include('citas.paciente.search')
	<br>
	</div>

	<div class="col-lg-12 col-md-12 col xs-12">
		<div class="table-responsive">
			<table class="table table-responsive table-bordered table-condensed table-hover">
				<thead>
					<th>id Paciente</th>
					<th>Apellidos y Nombres</th>
					<th>Genero</th>
					<th>Direccion</th>
					<th>Telefono</th>
					<th>Email</th>
				</thead>	
			  <tbody>
			  	@foreach ($paciente as $pac)
			  	<tr>
			  		<td>{{$pac->idpaciente}}</td>
			  		<td>{{$pac->apellidos}} , {{$pac->nombre}}</td>
			  		<td>{{$pac->genero}}</td>
			  		<td>{{$pac->direccion}}</td>
			  		<td>{{$pac->telefono}}</td>
			  		<td>{{$pac->email}}</td>	
			  		<td><a href="{{URL::action('PacienteController@edit',$pac->idcitas)}}"><button class="btn btn-info">Editar</button></a>
			  		<a href="" data-target="#modal-delete-{{$pac->idpaciente}}" data-toggle="modal"><button class="btn btn-dager">Eliminar</button></a></td>
			  	</tr>

			  	@include('citas.paciente.modal')
			  	@endforeach
				</tbody>
			</table>
		</div>
		{{$paciente->render()}}
	</div>
</div>

@endsection 

