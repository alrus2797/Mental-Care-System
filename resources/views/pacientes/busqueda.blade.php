<div class="table-responsive">
	<div class="tablaPacientes col-sm-12">

		{{$respuesta}}
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
					@foreach($respuesta as $paciente)
						<tr>
							<td>{{$paciente->nombres}}</td>
							<td>{{$paciente->apellidopaterno}}</td>
							<td>{{$paciente->apellidomaterno}}</td>
							<td>{{$paciente->dni}}</td>
							<td>{{$paciente->direccion}}</td>
							<td>{{$paciente->telefono}}</td>
							<td>{{$paciente->email}}</td>
							<td>{{$paciente->nombre_estado}}</td>
							<td><a href="{{asset('pacientes')}}{{'/'.$paciente->pac_id}}">
									<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
							</td>
							<td><a href="{{asset('pacientes')}}{{'/'.$paciente->pac_id.'/'}}"  id="user">
									<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
							</td>
							<td><a href="{{asset('pacientes')}}{{'/'.$paciente->pac_id.'/editar'}}"  id="edit">
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							 </td>
							<td><a href="{{asset('pacientes')}}{{'/'.$paciente->pac_id.'/eliminar'}}"  id="elimin">
									<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
								</td>
						</tr>
					@endforeach
				</tbody>
			</table>
	</div>
</div>
