<div class="table-responsive">
	<div class="tablaPersonas col-sm-12">
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
						<th> Ver</th>
						<th> Editar </th>
						<th> Eliminar </th>
					</tr>
				</thead>
				<tbody>
					@foreach($respuesta as $persona)
						<tr>
							<td>{{$persona->nombres}}</td>
							<td>{{$persona->apellidopaterno}}</td>
							<td>{{$persona->apellidomaterno}}</td>
							<td>{{$persona->dni}}</td>
							<td>{{$persona->direccion}}</td>
							<td>{{$persona->telefono}}</td>
							<td>{{$persona->email}}</td>
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
