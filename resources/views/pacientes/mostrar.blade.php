

@extends('layouts.app')
@section('title', 'Ver Paciente')

@section('content')


<h2>Ver Paciente</h2> <br><br>



<div >

<div class="form-group col-sm-12">
  <label class="col-sm-2 col-form-label" for="email">Historia Clinica:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="historia" placeholder="Ingrese historia clinica" name="historia" value="{{$paciente->historials_id}}" readonly>
  </div>

  <label class="col-sm-2 col-form-label" for="email">Apellido Paterno:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" value="{{$persona->apellidopaterno}}" readonly>
  </div>
</div>

<div class="form-group col-sm-12">
  <label class="col-sm-2 col-form-label" for="email">Apellido Materno:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" value="{{$persona->apellidomaterno}}" readonly>
  </div>
  <label class="col-sm-2 col-form-label" for="email">Nombres:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres"  value="{{$persona->nombres}}" readonly>
  </div>
</div>


<div class="form-group col-sm-12">
  <label class="col-sm-2 col-form-label" for="email">DNI:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" value="{{$persona->dni}}" readonly>
  </div>

  <label class="col-sm-2 col-form-label" for="email">Dirección:</label>
  <div class="col-sm-3">
        <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion"  value="{{$persona->direccion}}" readonly>
  </div>
</div>

  <div class="form-group col-sm-12">
   <label class="col-sm-2 col-form-label" for="email">Telefono:</label>
   <div class="col-sm-3">
         <input type="text" class="form-control" id="telefono" placeholder="Ingrese telefono" name="telefono"  value="{{$persona->telefono}}" readonly>
   </div>
    <label class="col-sm-2 col-form-label" for="email">Email:</label>
    <div class="col-sm-3">
          <input type="text" class="form-control" id="email" placeholder="Ingrese email" name="email"  value="{{$persona->email}}" readonly>
    </div>
  </div>
    <div class="form-group col-sm-12">
     <label class="col-sm-2 col-form-label" for="estado">Estado:</label>
     <div class="col-sm-3">
       <input type="text" class="form-control" id="estado" placeholder="Ingrese estado" name="estado"  value="{{$estado->nombre}}" readonly>
     </div>
      <label class="col-sm-2 col-form-label" for="registro">Fecha de Registro:</label>
      <div class="col-sm-3">
           <label class="form-control" id="registro" name="registro">{{$persona->created_at}}</label>
      </div>
    </div>

    <div class="form-group col-sm-12">
          <div class="col-sm-2"></div>
          <div class="col-sm-3"></div>
          <label class="col-sm-2 col-form-label" for="registro">Última Fecha de Actualización:</label>
          <div class="col-sm-3">
               <label class="form-control" id="actualizacion" name="actualizacion">{{$persona->updated_at}}</label>
          </div>
      </div>

    <div class="form-group col-sm-12">
      <div class="col-sm-3">
      <form action="{{asset('pacientes')}}">
          <input class="btn btn-primary" type="submit" value="Todos los Pacientes">
      </form>
      </div>
      <div class="col-sm-3">
        <form action="{{asset('pacientes')}}{{'/'.$paciente->id.'/editar'}}">
            <input class="btn btn-primary" type="submit" value="Editar Paciente">
        </form>
      </div>
    </div>
</div>



@endsection
