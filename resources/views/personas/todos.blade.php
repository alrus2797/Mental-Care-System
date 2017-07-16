@extends('layouts.template')
@section('title', 'Personas')

@section('content')

<h2>Personas</h2><br><br>

<div class="table-responsive">
	<div class="tablapersonas col-sm-12">
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
					@foreach($tabla as $persona)
						<tr>
							<td>{{$persona->nombres}}</td>
							<td>{{$persona->apellidopaterno}}</td>
							<td>{{$persona->apellidomaterno}}</td>
							<td><a href="{{asset('personas')}}{{'/'.$persona->id}}">{{$persona->dni}}</td>
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


{!! $tabla->render() !!}

@endsection
