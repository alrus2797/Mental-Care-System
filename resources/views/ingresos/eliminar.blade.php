@extends('layouts.app')
@section('title', 'Eliminar Ingreso')
@section('content')

 <h2>Eliminar Ingreso</h2>

<div style="background-color: rgba(0, 0, 0, 0.1); padding: 20px; border-radius: 10px; margin: 30px">
      <form method="POST" action="{{asset('ingresos/eliminar')}}">

      {{csrf_field()}}

      <input type="hidden" id="ingreso_id" name="ingreso_id" value="{{$get->id}}">


  <div class="form-group col-sm-12">
    <label class="col-sm-2 col-form-label" for="fecha">Fecha de Ingreso (Admisión):</label>
    <div class="col-sm-6">
          <input type="date" class="form-control" id="fecha" name="fecha" value="{{$get->fecha}}" readonly>
    </div>
  </div>


    <div class="form-group col-sm-12">
        <label class="col-sm-2 col-form-label" for="registro">Fecha de Registro:</label>
        <div class="col-sm-3">
          <label class="form-control" id="registro" name="registro">{{$get->created_at}}</label>
        </div>
        <div class="col-sm-2"> </div>
        <label class="col-sm-2 col-form-label" for="registro">Última Fecha de Actualización:</label>
        <div class="col-sm-3">
             <label class="form-control" id="actualizacion" name="actualizacion">{{$get->updated_at}}</label>
        </div>
    </div>

<button type="submit" class="btn btn-primary"> Eliminar </button>
<a href="{{asset('ingresos')}}">Cancelar</a>

</form>
</div>
@endsection
