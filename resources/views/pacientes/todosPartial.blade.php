<div class=" tablaPacientes table-responsive">
	<div class="tablapacientes col-sm-12">
			<table class="table col-sm-12">
				<thead>
					<tr>
						<th>Nombres</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>DNI</th>
						<th>Sexo</th>
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
							<td>@if ("M" == $paciente->sexo) Masculino @endif
							@if ("F" == $paciente->sexo) Femenino @endif
							@if ("O" == $paciente->sexo) Otro @endif</td>
							<td>{{$paciente->nombre_estado}}</td>
              				<td><a href="{{asset('pacientes')}}{{'/'.$paciente->pac_id}}" id="historia">
              						<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
              				</td>
							<td>
									<a href="{{asset('pacientes')}}{{'/'.$paciente->pac_id.'/'}}"  id="user"> <span class="glyphicon glyphicon-user" aria-hidden="true" ></span> </a>
							</td>
							<td>
									<a href="{{asset('pacientes')}}{{'/'.$paciente->pac_id.'/editar'}}"  id="edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							 </td>
							<td>
									<a href="{{asset('pacientes')}}{{'/'.$paciente->pac_id.'/eliminar'}}"  id="elimin"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a>
								</td>

						</tr>
					@endforeach
				</tbody>
			</table>
	</div>
  {!! $tabla->render() !!}
</div>
