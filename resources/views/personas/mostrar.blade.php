

@extends('layouts.template')
@section('title', 'Ver Persona')

@section('content')


<h2>Ver Persona</h2> <br><br>



<div >

        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="apellidopaterno">Apellido Paterno:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" value="{{$tabla->apellidopaterno}}" readonly>
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="apellidomaterno">Apellido Materno:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" value="{{$tabla->apellidomaterno}}" readonly>
          </div>
        </div>

        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="nombres">Nombres:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" value="{{$tabla->nombres}}" readonly>
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="dni">DNI:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" value="{{$tabla->dni}}" readonly>
          </div>
        </div>



        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="direccion">Dirección:</label>
          <div class="col-sm-3">
                <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion" value="{{$tabla->direccion}}" readonly>
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="telefono">Telefono:</label>
          <div class="col-sm-3">
               <input type="text" class="form-control" id="telefono" placeholder="Ingrese dirección" name="telefono" value="{{$tabla->telefono}}" readonly>
          </div>
        </div>

        <div class="form-group col-sm-12">
          <label class="col-sm-2 col-form-label" for="email">Email:</label>
          <div class="col-sm-3">
              <input type="text" class="form-control" id="email" placeholder="Ingrese dirección" name="email" value="{{$tabla->email}}" readonly>
          </div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="registro">Fecha de Registro:</label>
          <div class="col-sm-3">
               <label class="form-control" id="registro" name="registro">{{$tabla->created_at}}</label>
          </div>
        </div>
        <div class="form-group col-sm-12">
          <div class="col-sm-2"></div>
          <div class="col-sm-3"></div>
          <div class="col-sm-2"></div>
          <label class="col-sm-2 col-form-label" for="registro">Última Fecha de Actualización:</label>
          <div class="col-sm-3">
               <label class="form-control" id="actualizacion" name="actualizacion">{{$tabla->updated_at}}</label>
          </div>
        </div>

        <div class="form-group col-sm-12">
          <div class="col-sm-3">
        <form action="{{asset('personas')}}{{'/'.$tabla->id.'/editar'}}">
                    <input class="btn btn-primary" type="submit" value="Editar Persona">
                </form>
              </div>
              <div class="col-sm-3">
                <form action="{{asset('personas')}}">
                    <input class="btn btn-primary" type="submit" value="Todas las Personas">
                </form>
              </div>
            </div>
    </div>



@endsection
