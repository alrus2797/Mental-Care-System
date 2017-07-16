@extends('layouts.template')
@section('title', 'Pacientes')

@section('content')

<h2>Pacientes</h2><br><br>


<div class="table-responsive">
	<div class="tablapacientes col-sm-12">
			<table class="table col-sm-12">
				<thead>
					<tr>
						<th>Nombres</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>DNI</th>
						<th>Dirección</th>
						<th>Teléfono</th>
						<th>Email</th>
            			<th>Estado</th>
            			<th>Historia</th>
						<th> Ver</th>
						<th> Editar </th>
						<th> Eliminar </th>

					</tr>
				</thead>
				<tbody>
					@foreach($tabla as $paciente)
						<tr>
							<td>{{$paciente->nombres}}</td>
							<td>{{$paciente->apellidopaterno}}</td>
							<td>{{$paciente->apellidomaterno}}</td>
							<td>{{$paciente->dni}}</td>
							<td>{{$paciente->direccion}}</td>
							<td>{{$paciente->telefono}}</td>
							<td>{{$paciente->email}}</td>
							<td>{{$paciente->nombre_estado}}</td>
              				<td><a href="{{asset('pacientes')}}{{'/'.$paciente->id}}">
              						<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
              				</td>
							<td>
									<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
							</td>
							<td>
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							 </td>
							<td>
									<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
								</td>

						</tr>
					@endforeach
				</tbody>
			</table>
	</div>
</div>






@endsection
