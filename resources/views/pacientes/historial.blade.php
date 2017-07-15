@extends('layouts.template')
@section('title', 'Inicio')


   
@section('content') 
<br>
<br>
<div class="row">
	<div class="col-md-4 col-md-offset-8">
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
	function ver() {
		// body...
	}

	function crear() {
		$.ajax({
    	    url: "{{asset('pres/crear')}}",
        	type: 'get',
       		success: function(resultado){
        	  console.log(resultado);
            	$("#crear").html(resultado);
        }});
	}
</script>

@endsection