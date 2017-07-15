@extends('layouts.template')
@section('title', 'Estados de Paciente')

@section('content')

<h2>Estados de Paciente</h2><br><br>


<div class="table-responsive">
	<div class="tablapersonas col-sm-12">
			<table class="table-striped col-sm-12">
				<thead>
					<tr>
						<th>Nombres</th>
						<th>Eliminar</th>

					</tr>
				</thead>
				<tbody>
					@foreach($tabla as $estado)
						<tr>
							<td><a href="{{asset('pacientes')}}{{'/estados/'.$estado->id}}">{{$estado->nombre}}</td>
							<td>
  							<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
	</div>
</div>

@endsection
