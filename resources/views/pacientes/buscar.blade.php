@extends('layouts.app')
@section('title', 'Buscar Pacientes')

@section('content')

<h2>Buscar Pacientes</h2><br><br>

<div >
        {{csrf_field()}}
        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="apellidopaterno">Apellido Paterno:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#telefono').val())">
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="apellidomaterno">Apellido Materno:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#telefono').val())">
          </div>
        </div>

        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="nombres">Nombres:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#telefono').val())">
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="dni">DNI:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#telefono').val())">
          </div>
        </div>



        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="telefono">Telefono:</label>
          <div class="col-sm-3">
               <input type="text" class="form-control" id="telefono" placeholder="Ingrese dirección" name="telefono" onkeyup="showPacientes($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#telefono').val())">
          </div>
        </div>

    </div>

<div class="tablaPacientes col-sm-12"><b></b></div>

<script>
	function showPacientes(apellidoP, apellidoM, nombres, DNI, telefono) {
    var parametros = {

    	"apellidoP" : apellidoP,
    	"apellidoM" : apellidoM,
    	"nombres" : nombres,
    	"DNI" : DNI,
      "telefono": telefono
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
