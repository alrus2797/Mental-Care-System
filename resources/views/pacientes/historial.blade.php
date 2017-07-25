@extends('layouts.app')
@section('title', 'Inicio')



@section('content')
<br>
<br>
<div class="row">
	<div class="col-md-8">

		<table class="table table-condensed">
		    <thead>
		      <tr>

		        <th>Paciente</th>

		        <th>Observaciones</th>
    				<th>Médico </span></th>
		        <th>Imprimir</th>


		      </tr>
		    </thead>
		    <tbody>
		      @foreach($prescripciones as $p)
		      <tr>
		        <td>{{$p->paciente->persona->nombre_completo()}}</td>
		        <td>{{$p->observacion}}</td>
						<th>{{$p->medico->persona()->nombre_completo()}}</th>

		        <td ><a href="{{url('prescripcion/imprimir')}}/{{$p->id}}"> <span class="glyphicon glyphicon-eye-open">  </span> </a>

		        </td>

		      </tr>
		      @endforeach

		    </tbody>
		  </table>

	</div>
	<div class="col-md-4 ">
		<div class="row">

		<div class="col-md-8">

		<h4>Recetas </h4>
		</div>
		<div class=" col-md-3">
			<button onclick="crear()" type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus" ></span></button>
		</div>

		</div>

		<br>

		<table class="table table-condensed">
    <thead>
      <tr>

        <th>Médico</th>

        <th>Observaciones</th>

        <th><span class="glyphicon glyphicon-eye-open"> </span></th>
      </tr>
    </thead>
    <tbody>

      <tr>

        <td>Pacientex</td>
        <td>Observaciones x del paciente x</td>

        <td><a onclick="ver()" href="#"> <span class="glyphicon glyphicon-eye-open">  </span> </a>



      </tr>

    </tbody>
  </table>
	</div>
</div>
  <div id="crear" ></div>


<script type="text/javascript">
  var paciente="{{$paciente_id}}";
	var nombre="{{$nombre}} {{$apellidos}}";
	var alergias={!!json_encode($alergias)!!};
	alergias=alergias.map(String);
	function ver() {
		// body..
	}



	function crear() {
		$.ajax({
    	    url: "{{asset('prescripcion/create')}}",
        	type: 'get',
       		success: function(resultado){
        	  console.log(resultado);
            	$("#crear").html(resultado);
        }});
	}
</script>

@endsection
