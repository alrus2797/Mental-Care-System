<div class=" tablaPacientes table-responsive">
	<div class="tablapacientes col-sm-12">
			<table class="table col-sm-12">
				<thead>
					<tr>
            <th>Historia</th>
						<th>Nombres</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>DNI</th>
						<th>Dirección</th>
						<th>Teléfono</th>
						<th>Email</th>
						<th> Ver</th>
						<th> Editar </th>
						<th> Eliminar </th>

					</tr>
				</thead>
				<tbody>
					@foreach($tabla as $paciente)
						<tr>
              <td><a href="{{asset('pacientes')}}{{'/'.$paciente->id}}">{{$paciente->historials_id}}</td>
							<td>{{$paciente->nombres}}</td>
							<td>{{$paciente->apellidopaterno}}</td>
							<td>{{$paciente->apellidomaterno}}</td>
							<td>{{$paciente->dni}}</td>
							<td>{{$paciente->direccion}}</td>
							<td>{{$paciente->telefono}}</td>
							<td>{{$paciente->email}}</td>
							<td>
									<a href="{{asset('pacientes')}}{{'/'.$paciente->id.'/'}}"  id="user"> <span class="glyphicon glyphicon-user" aria-hidden="true" ></span> </a>
							</td>
							<td>
									<a href="{{asset('pacientes')}}{{'/'.$paciente->id.'/editar'}}"  id="edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							 </td>
							<td>
									<a href="{{asset('pacientes')}}{{'/'.$paciente->id.'/eliminar'}}"  id="elimin"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a>
								</td>

						</tr>
					@endforeach
				</tbody>
			</table>
	</div>
  {!! $tabla->render() !!}
</div>
