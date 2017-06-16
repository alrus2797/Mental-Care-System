@extends('layouts.prescriptionsTemplate')
@section('title', 'Buscar Pacientes')

@section('content')

<h2>Buscar Pacientes</h2><br><br>

<div class="container-fluid col-sm-10">
  <form>
{{csrf_field()}}
<div class="row">
    <div class="form-group">
      <label class="col-sm-1 col-form-label" for="historiaclinica">Historia Clinica:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="historiaclinica" placeholder="Ingrese historia clinica" name="historiaclinica" onkeyup="showPacientes($('#historiaclinica').val(), $('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-1 col-form-label" for="apellidopaterno">Apellido Paterno:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" onkeyup="showPacientes($('#historiaclinica').val(), $('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
      </div>
    </div>
	
    <div class="form-group">
      <label class="col-sm-1 col-form-label" for="apellidomaterno">Apellido Materno:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" onkeyup="showPacientes($('#historiaclinica').val(), $('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
      </div>
    </div>
</div>

<div class="row">

     <div class="form-group">
      <label class="col-sm-1 col-form-label" for="nombres">Nombres:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" onkeyup="showPacientes($('#historiaclinica').val(), $('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
      </div>
    </div>
	
    <div class="form-group">
      <label class="col-sm-1 col-form-label" for="dni">DNI:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" onkeyup="showPacientes($('#historiaclinica').val(), $('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
      </div>
    </div>

   	<div class="form-group">
      <label class="col-sm-1 col-form-label" for="direccion">Dirección:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion" onkeyup="showPacientes($('#historiaclinica').val(), $('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
      </div>
  	</div>
</div>
</form>
<br><br>
<div class="row">

	<div class="tablaPacientes col-sm-12"><b>No hay resultados...</b></div>

</div>
</div>
<script>
	function showPacientes(historia, apellidoP, apellidoM, nombres, DNI, direccion) {
    var parametros = {
    	"historia" : historia,
    	"apellidoP" : apellidoP,
    	"apellidoM" : apellidoM,
    	"nombres" : nombres,
    	"DNI" : DNI,
    	"direccion" : direccion
    };
    $.ajax({
    	data: parametros,
    	url: 'retrievePacientes',
    	type: 'get',
    	dataType : 'json',
    	success: function(data){
    		$(".tablaPacientes").html(data);
    	}
    });
    }
</script>

@endsection