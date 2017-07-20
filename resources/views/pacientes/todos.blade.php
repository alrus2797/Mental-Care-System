@extends('layouts.app')
@section('title', 'Pacientes')

@section('content')

<h2>Pacientes</h2><br><br>


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
            <th>Prescripción</th>
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
              				<td class="text-center"><a href="{{asset('pacientes')}}{{'/historial/'.$paciente->pac_id}}" id="historia">
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



<!-- the form to be viewed as dialog-->
<form id="new-nota" method="POST" action="{{asset('pacientes/crear')}}">
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

    url:  'pacientes?page=' + page,

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




<!--
<script>

$(document).ready(function(){

  $(".edit").click(function(e){

    e.preventDefault();
    var $tmp = $(this).attr('href');
    console.log($tmp);
    var $edi = $tmp +  " #PacienteEditar";
    $("#editar").load($edi);
    alertify.genericDialog || alertify.dialog('genericDialog',function(){
return {
    main:function(content){
        this.setContent(content);
    },
    setup:function(){
        return {
            focus:{
                element:function(){
                    return this.elements.body.querySelector(this.get('selector'));
                },
                select:true
            },
            options:{
                basic:true,
                maximizable:false,
                resizable:false,
                padding:false
            }
        };
    },
    settings:{
        selector:undefined
    }
};
});
//force focusing password box
alertify.genericDialog ($('#editar')[0]).set('selector', 'input[type="password"]');

  });

});


</script>

-->
@endsection
