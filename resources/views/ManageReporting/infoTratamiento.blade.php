

@extends('layouts.template')
@section('title', 'Inicio')



   @section('content')

   <div id="printableArea">

 <div class="page-header">
      <h2>Información de tratamiento</h2>

  </div>

<a href="{{asset($ruta)}}" target="_blank">Ver en pdf</a>

<div class="col-md-10 col-md-offset-0 table-responsive">

  <form class="form-inline">
    <div class="form-group">
      <label for="date">Selecciona el mes : </label>
      <input type="month" class="form-control" name="mes">
    </div>
    <button type="submit" class="btn btn-default">Buscar</button>
  </form>

  <hr>


Información tratamiento




</div>
     </div>
 <div class="col-sm-offset-0 ">
	<input type="button" class="btn btn-default"  onclick="printDiv('printableArea')" value="Imprimir o exportar a PDF" />
</div>



   @endsection
