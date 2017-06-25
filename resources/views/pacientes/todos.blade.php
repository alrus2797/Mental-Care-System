@extends('layouts.prescriptionsTemplate')
@section('title', 'Pacientes')

@section('content')

<h2>Pacientes</h2><br><br>

<div class="table-responsive">
	<div class="tablaPacientes col-sm-12">
			<table class="table-striped col-sm-12">
				<thead>
					<tr>
						<th>Nombres</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>DNI</th>
						<th>Dirección</th>
						<th>Historia Clínica</th>
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
							<td><a href="{{asset('pacientes')}}{{'/'.$paciente->id}}">{{$paciente->historiaclinica}}</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
	</div>
</div>

@endsection
