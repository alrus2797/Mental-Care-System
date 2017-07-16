@extends('layouts.template')
@section('title', 'Buscar Pacientes')

@section('content')

<h2>Buscar Pacientes</h2><br><br>

<!--<div class="container-fluid col-sm-12">
  <form>
{{csrf_field()}}
<div class="row">

    <div class="form-group">
      <label class="col-sm-1 col-form-label" for="apellidopaterno">Apellido Paterno:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-1 col-form-label" for="apellidomaterno">Apellido Materno:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
      </div>
    </div>
</div>

<div class="row">

     <div class="form-group">
      <label class="col-sm-1 col-form-label" for="nombres">Nombres:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
      </div>
    </div>

    <div class="form-group">
      <label class="col-sm-1 col-form-label" for="dni">DNI:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
      </div>
    </div>

   	<div class="form-group">
      <label class="col-sm-1 col-form-label" for="direccion">Dirección:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
      </div>
  	</div>
</div>
</form>
<br><br>
<div class="row">

	<div class="tablaPacientes col-sm-12 col-md-12"><b>No hay resultados...</b></div>

</div>
</div>-->

<div style="background-color: rgba(0, 0, 0, 0.1); padding: 20px; border-radius: 10px; margin: 30px">
        {{csrf_field()}}
        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="apellidopaterno">Apellido Paterno:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="apellidomaterno">Apellido Materno:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
          </div>
        </div>

        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="nombres">Nombres:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="dni">DNI:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
          </div>
        </div>



        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="direccion">Dirección:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="telefono">Telefono:</label>
          <div class="col-sm-3">
               <input type="text" class="form-control" id="telefono" placeholder="Ingrese dirección" name="telefono" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
          </div>
        </div>

        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="email">Email:</label>
          <div class="col-sm-3">
              <input type="text" class="form-control" id="email" placeholder="Ingrese dirección" name="email" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#direccion').val())">
          </div>
        </div>
    </div>

<div class="tablaPacientes col-sm-12"><b>No hay resultados...</b></div>

<script>
	function showPacientes(apellidoP, apellidoM, nombres, DNI, direccion) {
    var parametros = {

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
