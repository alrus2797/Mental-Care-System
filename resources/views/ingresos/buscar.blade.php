@extends('layouts.app')
@section('title', 'Buscar Pacientes')

@section('content')

<h2>Buscar Ingreso de Paciente</h2><br><br>

<div >
        {{csrf_field()}}
        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="apellidopaterno">Apellido Paterno:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" onkeyup="showIngresos($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#telefono').val(),$('#fecha').val())">
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="apellidomaterno">Apellido Materno:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" onkeyup="showIngresos($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#telefono').val(),$('#fecha').val())">
          </div>
        </div>

        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="nombres">Nombres:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" onkeyup="showIngresos($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#telefono').val(),$('#fecha').val())">
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="dni">DNI:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" onkeyup="showIngresos($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#telefono').val(),$('#fecha').val())">
          </div>
        </div>



        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="telefono">Telefono:</label>
          <div class="col-sm-3">
               <input type="text" class="form-control" id="telefono" placeholder="Ingrese telefono" name="telefono" onkeyup="showIngresos($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#telefono').val(),$('#fecha').val())">
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="fecha">Fecha de Ingreso:</label>
          <div class="col-sm-3">
               <input type="date" class="form-control" id="fecha" placeholder="Ingrese fecha" name="telefono" onkeyup="showIngresos($('#apellidopaterno').val(), $('#apellidomaterno').val(), $('#nombres').val(), $('#dni').val(), $('#telefono').val(),$('#fecha').val())">
          </div>
        </div>

    </div>

<div class="tablaIngresos col-sm-12"><b></b></div>

<script>
	function showIngresos(apellidoP, apellidoM, nombres, DNI, telefono,fecha) {
    var parametros = {

    	"apellidoP" : apellidoP,
    	"apellidoM" : apellidoM,
    	"nombres" : nombres,
    	"DNI" : DNI,
      "telefono": telefono,
      "fecha":fecha
    };
    $.ajax({
    	data: parametros,
    	url: 'retrieveIngresos',
    	type: 'get',
    	dataType : 'json',
    	success: function(data){
    		$(".tablaIngresos").html(data);
    	}
    });
    }
</script>

@endsection
