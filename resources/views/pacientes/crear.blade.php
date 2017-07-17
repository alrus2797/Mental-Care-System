@extends('layouts.template')
@section('title', 'Registrar Paciente')


@section('content')

<h2>Crear Paciente</h2><br><br>

<div >
    <form>
      {{csrf_field()}}


      <div class="form-group col-sm-12">
          <label class="col-sm-1 col-form-label" for="dni">DNI:</label>
          <div class="col-sm-3">
            <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" onkeyup="showPersonas($('#dni').val())">
          </div>
      </div>

    </form>

    <div class="form-group col-sm-12">
      <div class="tablaPersonasDNI col-sm-12 "><b>No hay resultados</b></div>
    </div>

    <div class="form-group col-sm-12">
      <div> <b> ¿No existe? Créalo </b> </div>
    </div>
    <div class="form-group col-sm-12">
      <div class="personaNueva col-sm-12">
        <button type="button" id="botonCrear" class="btn btn-default" aria-label="Center Align" onclick="crearNuevaPersona()"> Crear Paciente y Persona Nueva </button>
      </div>
    </div>
</div>

<script src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.3.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/jquery.validate.min.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.0/additional-methods.min.js"></script>

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

  function crearNuevaPersona(){

    $.ajax(

      {
        url:'crearNuevaPersona',
        type: 'get',
        dataType: 'json',
        success: function(data){
            $(".personaNueva").html(data);
        }
      }

    );

  }

</script>




@endsection
