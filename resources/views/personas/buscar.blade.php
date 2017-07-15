@extends('layouts.template')
@section('title', 'Buscar Personas')

@section('content')

<h2>Buscar Personas</h2><br><br>

<div class="container-fluid col-sm-10">
  <form>
{{csrf_field()}}
<div class="row">


    <div class="form-group">
      <label class="col-sm-1 col-form-label" for="apellidopaterno">Apellido Paterno:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" onkeyup="showPersonas($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val(), $('#telefono').val(), $('#email').val())">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-1 col-form-label" for="apellidomaterno">Apellido Materno:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" onkeyup="showPersonas( $('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val(), $('#telefono').val(), $('#email').val())">
      </div>
    </div>

    <div class="form-group">
     <label class="col-sm-1 col-form-label" for="nombres">Nombres:</label>
     <div class="col-sm-3">
           <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" onkeyup="showPersonas( $('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val(), $('#telefono').val(), $('#email').val())">
     </div>
   </div>

</div>

<div class="row">



    <div class="form-group">
      <label class="col-sm-1 col-form-label" for="dni">DNI:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" onkeyup="showPersonas( $('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val(), $('#telefono').val(), $('#email').val())">
      </div>
    </div>

   	<div class="form-group">
      <label class="col-sm-1 col-form-label" for="direccion">Dirección:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion" onkeyup="showPersonas( $('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val(), $('#telefono').val(), $('#email').val())">
      </div>
  	</div>

    <div class="form-group">
     <label class="col-sm-1 col-form-label" for="telefono">Telefono:</label>
     <div class="col-sm-3">
           <input type="text" class="form-control" id="telefono" placeholder="Ingrese telefono" name="telefono" onkeyup="showPersonas($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val(), $('#telefono').val(), $('#email').val())">
     </div>
   </div>

   <div class="form-group">
    <label class="col-sm-1 col-form-label" for="email">Email:</label>
    <div class="col-sm-3">
          <input type="text" class="form-control" id="email" placeholder="Ingrese email" name="email" onkeyup="showPersonas($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val(), $('#telefono').val()), $('#email').val())">
    </div>
  </div>


</div>
</form>
<br><br>
<div class="row">

	<div class="tablaPersonas col-sm-12"><b>No hay resultados...</b></div>

</div>
</div>
<script>
	function showPersonas(apellidoP, apellidoM, nombres, DNI, direccion, telefono, email) {
    var parametros = {

    	"apellidoP" : apellidoP,
    	"apellidoM" : apellidoM,
    	"nombres" : nombres,
    	"DNI" : DNI,
    	"direccion" : direccion,
      "telefono" : telefono,
      "email" : email
    };
    $.ajax({
    	data: parametros,
    	url: 'retrievePersonas',
    	type: 'get',
    	dataType : 'json',
    	success: function(data){
    		$(".tablaPersonas").html(data);
    	}
    });
    }
</script>

@endsection
