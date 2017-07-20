@extends('layouts.app')
@section('title', 'Ingresos')

@section('content')

<h2>Ingresos</h2><br><br>


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
            <th>Fecha del ingreso</th>
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
              <td>{{$paciente->fecha}}</td>
							<td>
									<a href="{{asset('ingresos')}}{{'/'.$paciente->ing_id.'/editar'}}"  id="edit"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
							 </td>
							<td>
									<a href="{{asset('ingresos')}}{{'/'.$paciente->ing_id.'/eliminar'}}"  id="elimin"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> </a>
								</td>

						</tr>
					@endforeach
				</tbody>
			</table>
	</div>
  {!! $tabla->render() !!}
</div>



<!-- the form to be viewed as dialog-->
<form id="new-nota" method="POST" action="{{asset('ingresos/crear')}}">
	{{ csrf_field()}}
<div id="form">


</div>
</form>

<div id="editar">


</div>

<div id="eliminar">



</div>


<script>

$(document).on('click','.pagination a',function(e){
  e.preventDefault();

  var p = $(this).attr('href').split('=');
  var page = p[1];
  var route = p[0];
  console.log(page);
  console.log(route);

  $.ajax({

    url:  'ingresos?page=' + page,

    type: 'GET',
    dataType: 'json',
    //data: {id:nota},
    success: function(data){
      //console.log(data1);

      //console.log(data);
      $(".tablaPacientes").html(data);

    }

  });


});

</script>
@endsection
