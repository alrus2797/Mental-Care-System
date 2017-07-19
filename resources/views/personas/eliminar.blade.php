@extends('layouts.app')
@section('title', 'Eliminar Persona')
@section('content')

 <h2>Eliminar Persona</h2>

 <div style="background-color: rgba(0, 0, 0, 0.1); padding: 20px; border-radius: 10px; margin: 30px">
       <form id="register-form" method="POST" action="{{asset('personas/eliminar')}}">
         {{csrf_field()}}
         <input type="hidden" id="id" name="id" value="{{$get->id}}">


         <div class="form-group col-sm-12">
           <label class="col-sm-2 col-form-label" for="apellidopaterno">Apellido Paterno:</label>
           <div class="col-sm-3">
                 <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" value="{{$get->apellidopaterno}}" readonly>
           </div>
           <div class="col-sm-2"></div>
           <label class="col-sm-2 col-form-label" for="apellidomaterno">Apellido Materno:</label>
           <div class="col-sm-3">
                 <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" value="{{$get->apellidomaterno}}" readonly>
           </div>
         </div>

         <div class="form-group col-sm-12">
           <label class="col-sm-2 col-form-label" for="nombres">Nombres:</label>
           <div class="col-sm-3">
                 <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" value="{{$get->nombres}}" readonly>
           </div>
           <div class="col-sm-2"></div>
           <label class="col-sm-2 col-form-label" for="sexo">Sexo:</label>
           <div class="col-sm-3">
             @if ("M" == $get->sexo) <input type="text" class="form-control" id="sexo" placeholder="Seleccione Sexo" name="sexo" value="Masculino" readonly> @endif
             @if ("F" == $get->sexo) <input type="text" class="form-control" id="sexo" placeholder="Seleccione Sexo" name="sexo" value="Femenino" readonly> @endif
             @if ("O" == $get->sexo) <input type="text" class="form-control" id="sexo" placeholder="Seleccione Sexo" name="sexo" value="Otro" readonly> @endif
           </div>

         </div>



         <div class="form-group col-sm-12">
           <label class="col-sm-2 col-form-label" for="dni">DNI:</label>
           <div class="col-sm-3">
                 <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" value="{{$get->dni}}" readonly>
           </div>
           <div class="col-sm-2"></div>
             <label class="col-sm-2 col-form-label" for="fechanacimiento">Fecha De Nacimiento:</label>
           <div class="col-sm-3">
             <input type="date" class="form-control" placeholder="Ingrese Fecha de Nacimiento" id="fechanacimiento" name="fechanacimiento" value="{{$get->fechanacimiento}}" readonly>
           </div>
         </div>

         <div class="form-group col-sm-12">
           <label class="col-sm-2 col-form-label" for="direccion">Dirección:</label>
           <div class="col-sm-3">
             <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion" value="{{$get->direccion}}" readonly>
           </div>
           <div class="col-sm-2"></div>
             <label class="col-sm-2 col-form-label" for="telefono">Telefono:</label>
           <div class="col-sm-3">
             <input type="text" class="form-control" id="telefono" placeholder="Ingrese dirección" name="telefono" value="{{$get->telefono}}" readonly>
           </div>
         </div>

         <div class="form-group col-sm-12">
             <label class="col-sm-2 col-form-label" for="email">Email:</label>
           <div class="col-sm-3">
             <input type="text" class="form-control" id="email" placeholder="Ingrese dirección" name="email" value="{{$get->email}}" readonly>
           </div>
           <div class="col-sm-2"></div>
           <div class="col-sm-2"></div>
           <div class="col-sm-3">

           </div>
         </div>


         <div class="form-group col-sm-12">
             <label class="col-sm-2 col-form-label" for="registro">Fecha de Registro:</label>
           <div class="col-sm-3">
             <label class="form-control" id="registro" name="registro">{{$get->created_at}}</label>
           </div>
           <div class="col-sm-2"></div>
           <label class="col-sm-2 col-form-label" for="registro">Última Fecha de Actualización:</label>
           <div class="col-sm-3">
                <label class="form-control" id="actualizacion" name="actualizacion">{{$get->updated_at}}</label>
           </div>
         </div>


         <button type="submit" class="btn btn-primary"> Eliminar </button>
         <a href="{{asset('personas')}}">Cancelar</a>


       </form>

     </div>

@endsection
