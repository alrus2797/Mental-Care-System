@extends('layouts.template')
@section('title', 'Registrar Paciente')


@section('content')

<h2>Crear Paciente</h2><br><br>

<div class="container-fluid col-sm-10">
  <form>
{{csrf_field()}}


<div class="row">



    <div class="form-group">
      <label class="col-sm-1 col-form-label" for="dni">DNI:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" onkeyup="showPersonas($('#dni').val())">
      </div>
    </div>


</div>
</form>
<br><br>

<div class="row">

	<div class="tablaPersonasDNI col-sm-12 "><b>No hay resultados</b></div>

</div>

<div class="row">

  <div> <b> ¿No existe? Créalo </b> </div>
  <button type="button" id="botonCrear" class="btn btn-default" aria-label="Center Align" onclick="crearNuevoPersona()"> </button>
  <div class="personaNueva col-sm-12"> <div>

</div>

</div>


<script>
	function showPersonas(DNI) {
    var parametros = {


    	"DNI" : DNI,
    };
    $.ajax({
    	data: parametros,
    	url: 'retrievePersonasDNI',
    	type: 'get',
    	dataType : 'json',
    	success: function(data){

    		$(".tablaPersonasDNI").html(data);
    	}
    });
    }
</script>


<script>

  function crearNuevoPersona(){

    $.ajax(

      {
        url:'crearNuevaPersona',
        type: 'post',
        dataType: 'json',
        success: function(data){
            $(".personaNueva").html(data);
        }
      }

    );

  }

</script>

@endsection
