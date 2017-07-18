@extends('layouts.app')
@section('title', 'Personas')

@section('content')

<h2>Personas</h2><br><br>

<div class="tablaPersonas table-responsive">
	<div class="tablapersonas col-sm-12">
			<table class="table col-sm-12">
				<thead>
					<tr>
						<th>Nombres</th>
						<th>Apellido Paterno</th>
						<th>Apellido Materno</th>
						<th>DNI</th>
						<th>Sexo</th>
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
							<td>{{$persona->dni}}</td>
							<td>{{$persona->sexo}}</td>

							<td>
									<a href="{{asset('personas')}}{{'/'.$persona->id}}"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
							</td>
							<td>
									<a href="{{asset('personas')}}{{'/'.$persona->id.'/editar'}}"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							 </td>
							<td>
									<a href="{{asset('personas')}}{{'/'.$persona->id.'/eliminar'}}"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>
								</td>

						</tr>
					@endforeach
				</tbody>
			</table>
	</div>
	{!! $tabla->render() !!}
</div>


<script>

$(document).on('click','.pagination a',function(e){
  e.preventDefault();

  var p = $(this).attr('href').split('=');
  var page = p[1];
  var route = p[0];
  //console.log(page);
  //console.log(route);

  $.ajax({

    url:  'personas?page=' + page,

    type: 'GET',
    dataType: 'json',
    //data: {id:nota},
    success: function(data){
      //console.log(data1);

      //console.log(data);
      $(".tablaPersonas").html(data);

    }

  });


});

</script>

@endsection
