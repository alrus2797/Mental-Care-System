<div class="table-responsive">
	<div class="tablaPersonasDNI col-sm-12">
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
            <th>¿Crear Paciente?</th>
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
								<button type="button" id="botonSeleccionar" class="btn btn-default" aria-label="Center Align" onclick="seleccionarPersona('{{$persona->id}}', '{{$persona->nombres}}', '{{$persona->apellidopaterno}}', '{{$persona->apellidomaterno}}', '{{$persona->dni}}', '{{$persona->direccion}}', '{{$persona->telefono}}', '{{$persona->email}}')">
  							<span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Crear
								</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
	</div>
</div>

<div class="formPaciente col-sm-12"></div>

<!-- {{$persona->id}},{{$persona->nombres}},{{$persona->apellidopaterno}},{{$persona->apellidomaterno}},{{$persona->dni}},{{$persona->direccion}},{{$persona->telefono}},{{$persona->email}}-->

<script>
	function seleccionarPersona(id, nombres, apellidoP, apellidoM, DNI, direccion, telefono, email) {
    var parametros = {
			"id" : id,
			//"apellidoP" : apellidoP,
    	//"apellidoM" : apellidoM,
    	//"nombres" : nombres,
    	//"DNI" : DNI,
    	//"direccion" : direccion,
      //"telefono" : telefono,
      //"email" : email
    };
    $.ajax({

    	data: parametros,
    	url: 'llenarPaciente',
    	type: 'get',
    	dataType : 'json',
    	success: function(data){

    		$(".formPaciente").html(data);
    	}
    });
    }
</script>
