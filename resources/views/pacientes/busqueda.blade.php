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
					</tr>
				</thead>
				<tbody>
					@foreach($respuesta as $paciente)
						<tr>
							<td>{{$paciente->nombres}}</td>
							<td>{{$paciente->apellidopaterno}}</td>
							<td>{{$paciente->apellidomaterno}}</td>
							<td><a href="{{asset('pacientes')}}{{'/'.$paciente->id}}">{{$paciente->dni}}</td>
							<td>{{$paciente->direccion}}</td>
						</tr>
					@endforeach
				</tbody>
			</table>
	</div>
</div>
