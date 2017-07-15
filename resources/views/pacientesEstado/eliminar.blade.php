@extends('layouts.template')
@section('title', 'Eliminar Estado de Paciente')
@section('content')

 <h2>Eliminar Estado de Paciente</h2>

<div>
<form method="POST" action="{{asset('pacientes/estados/eliminar')}}">

{{csrf_field()}}

<input type="hidden" id="id" name="id" value="{{$get->id}}">



    </div>
        <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Nombre de Estado:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres"  value="{{$get->nombre}}" readonly>
      </div>
    </div>






<button type="submit" class="btn btn-primary"> Eliminar </button>
<a href="{{asset('personas/')}}">Cancelar</a>

</form>
</div>
@endsection
