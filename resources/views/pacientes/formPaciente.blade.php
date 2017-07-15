
<div class="formPaciente col-sm-12">


  <form method="POST" action="{{asset('pacientes/agregar')}}">

  {{csrf_field()}}


  <input type="hidden" class="form-control" id="id" placeholder="Ingrese apellido paterno" name="id" value="{{$respuesta->id}}">

    <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Apellido Paterno:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" value="{{$respuesta->apellidopaterno}}">
      </div>
    </div>



    <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Apellido Materno:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" value="{{$respuesta->apellidomaterno}}">
      </div>

    </div>
        <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Nombres:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" value="{{$respuesta->nombres}}">
      </div>
    </div>



    <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">DNI:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" value="{{$respuesta->dni}}">
      </div>
    </div>

     <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Dirección:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion" value="{{$respuesta->direccion}}">
      </div>
    </div>

    <div class="form-group">
     <label class="col-sm-2 col-form-label" for="email">Telefono:</label>
     <div class="col-sm-3">
           <input type="text" class="form-control" id="telefono" placeholder="Ingrese dirección" name="telefono" value="{{$respuesta->telefono}}">
     </div>
   </div>

   <div class="form-group">
    <label class="col-sm-2 col-form-label" for="email">Email:</label>
    <div class="col-sm-3">
          <input type="text" class="form-control" id="email" placeholder="Ingrese dirección" name="email" value="{{$respuesta->email}}">
    </div>
  </div>

  <div class="form-group">
   <label class="col-sm-2 col-form-label" for="email">Estado:</label>
   <div class="col-sm-3">
         <input type="text" class="form-control" id="estado" placeholder="Ingrese dirección" name="email" value="hola">
   </div>
  </div>

  <button type="submit" class="btn btn-primary">Guardar</button>


  </form>



</div>
