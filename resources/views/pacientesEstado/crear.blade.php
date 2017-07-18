@extends('layouts.app')
@section('title', 'Registrar Estado de Paciente')


@section('content')

<h2>Registro de Estado de Paciente</h2>

<div >
  <form method="POST" action="{{asset('pacientes/estados/crear')}}">

{{csrf_field()}}



   <div class="form-group">
    <label class="col-sm-2 col-form-label" for="email">Nombre de Estado:</label>
    <div class="col-sm-3">
          <input type="text" class="form-control" id="nombre" placeholder="Ingrese nombre de estado" name="nombre" >
    </div>
  </div>


  <button type="submit" class="btn btn-primary">Guardar</button>


</form>

</div>


@endsection
