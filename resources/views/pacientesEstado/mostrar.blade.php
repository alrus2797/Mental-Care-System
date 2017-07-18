@extends('layouts.app')
@section('title', 'Ver Estado de Paciente')

@section('content')


<h2>Ver Estado de Paciente</h2> <br><br>



<div>





<div class="form-group">
  <label class="col-sm-2 col-form-label" for="email">Nombres:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="nombre" placeholder="Ingrese nombre de Estado" name="nombre"  value="{{$tabla->nombre}}" readonly>
  </div>
</div>




</div>




@endsection
