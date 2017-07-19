@extends('layouts.app')
@section('title', 'Eliminar Ingreso')
@section('content')

 <h2>Eliminar Ingreso</h2>

<div style="background-color: rgba(0, 0, 0, 0.1); padding: 20px; border-radius: 10px; margin: 30px">
      <form method="POST" action="{{asset('ingresos/eliminar')}}">

      {{csrf_field()}}

      <input type="hidden" id="id" name="id" value="{{$get->id}}">

      <input type="hidden" id="persona_id" name="persona_id" value="{{$getPersona->id}}">

      <div class="form-group col-sm-12">
        <label class="col-sm-2 col-form-label" for="apellidopaterno">Apellido Paterno:</label>
        <div class="col-sm-3">
              <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" value="{{$getPersona->apellidopaterno}}"  readonly>
        </div>
        <div class="col-sm-2"></div>
        <label class="col-sm-2 col-form-label" for="apellidomaterno">Apellido Materno:</label>
        <div class="col-sm-3">
              <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" value="{{$getPersona->apellidomaterno}}" readonly>
        </div>
      </div>

      <div class="form-group col-sm-12">
        <label class="col-sm-2 col-form-label" for="nombres">Nombres:</label>
        <div class="col-sm-3">
              <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" value="{{$getPersona->nombres}}" readonly>
        </div>
        <div class="col-sm-2"></div>
        <label class="col-sm-2 col-form-label" for="sexo">Sexo:</label>
        <div class="col-sm-3">
          @if ("M" == $getPersona->sexo) <input type="text" class="form-control" id="sexo" placeholder="Seleccione Sexo" name="sexo" value="Masculino" readonly> @endif
          @if ("F" == $getPersona->sexo) <input type="text" class="form-control" id="sexo" placeholder="Seleccione Sexo" name="sexo" value="Femenino" readonly> @endif
          @if ("O" == $getPersona->sexo) <input type="text" class="form-control" id="sexo" placeholder="Seleccione Sexo" name="sexo" value="Otro" readonly> @endif
        </div>

      </div>



      <div class="form-group col-sm-12">
        <label class="col-sm-2 col-form-label" for="dni">DNI:</label>
        <div class="col-sm-3">
              <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" value="{{$getPersona->dni}}" readonly>
        </div>
        <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="fechanacimiento">Fecha De Nacimiento:</label>
        <div class="col-sm-3">
          <input type="date" class="form-control" placeholder="Ingrese Fecha de Nacimiento" id="fechanacimiento" name="fechanacimiento" value="{{$getPersona->fechanacimiento}}" readonly>
        </div>
      </div>

      <div class="form-group col-sm-12">
        <label class="col-sm-2 col-form-label" for="direccion">Dirección:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion" value="{{$getPersona->direccion}}" readonly >
        </div>
        <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="telefono">Telefono:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="telefono" placeholder="Ingrese dirección" name="telefono" value="{{$getPersona->telefono}}" readonly>
        </div>
      </div>

      <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="email">Email:</label>
        <div class="col-sm-3">
          <input type="text" class="form-control" id="email" placeholder="Ingrese dirección" name="email" value="{{$getPersona->email}}" readonly >
        </div>
      </div>


        <div class="form-group col-sm-12">
              <label class="col-sm-2 col-form-label" for="registro">Fecha de Registro:</label>
              <div class="col-sm-3">
                <label class="form-control" id="registro" name="registro">{{$getPersona->created_at}}</label>
              </div>
              <div class="col-sm-2"> </div>
              <label class="col-sm-2 col-form-label" for="registro">Última Fecha de Actualización:</label>
              <div class="col-sm-3">
                   <label class="form-control" id="actualizacion" name="actualizacion">{{$getPersona->updated_at}}</label>
              </div>
          </div>


<button type="submit" class="btn btn-primary"> Eliminar </button>
<a href="{{asset('ingresos')}}">Cancelar</a>

</form>
</div>
@endsection
