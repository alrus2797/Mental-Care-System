

@extends('layouts.template')
@section('title', 'Inicio')


   @section('content')


 <div class="page-header" id="topdfheader">
      <h2>Reporte de pacientes atendidos por Medico </h2>
    <p>Reportes mensuales de pacientes atendidos por Medico.</p>
  </div>
  <form class="form-inline">
    <div class="form-group">
      <label for="date">Selecciona el mes : </label>
      <input type="month" class="form-control" name="mes">
    </div>
    <button type="submit" class="btn btn-default">Buscar</button>
  </form>

<div class="col-md-10 col-md-offset-0 table-responsive" id=topdfbody>

  @if($results == NULL)
      <div><h4>No se encontraron resultados</h4></div>
  @else

  <h4>Resultados resultados encontrados</h4>
  <hr>

   <table class="table table-hover table-bordered">
    <tr>
        <th>Medico</th>
        <th>Paciente</th>
        <th>Fecha de la cita </th>
        <th>Observación</th>
    </tr>
    @foreach ($results as $row)
      <tr>
        <td>{{$row->nombre_med}}</td>
        <td>{{$row->nombre_pac}}</td>
        <td>{{$row->fecha}}</td>
        <td>{{$row->obsmed}}</td>
      </tr>
    @endforeach
    </table>
    @endif

</div>

<div>
	<a  onclick="cargar()" target="_blank" method="post">Ver en pdf</a>
</div>


<a href="javascript:imprSelec('historial')">Imprimir</a>

    <script >
      function cargar()
      {
        header= document.getElementById('topdfheader').innerHTML;
        body  = document.getElementById('topdfbody').innerHTML;
        location.href="exportarRep?tipo=semAten&fecha=&htmlex="+header+body+""+;
      }
    </script>
<script>
function imprSelec(topdfbody){
  var ficha=document.getElementById(topdfbody);
  var ventimp=window.open(' ','topdfbody');
  ventimp.document.write(ficha.innerHTML);
  ventimp.document.close();
  ventimp.print();
  ventimp.close();
}
</script>


<button>ver</button>




   @endsection
