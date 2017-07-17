@extends('layouts.template')
@section('title', 'Editar Estado de Paciente')

@section('content')

 <h2>Edición de Estado de Paciente</h2>

<div>
<form method="POST" action="{{asset('pacientes/estados/'.$get->id)}}">

{{csrf_field()}}

<input type="hidden" id="id" name="id" value="{{$get->id}}">


    </div>
        <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Nombre de Estado:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="nombre" placeholder="Ingrese nombre de estado" name="nombre"  value="{{$get->nombre}}">
      </div>
    </div>






 <button type="submit" class="btn btn-primary">Guardar</button>
 <a href="{{asset('pacientes/estados/todos')}}">Cancelar</a>

</form>
</div>
@endsection
