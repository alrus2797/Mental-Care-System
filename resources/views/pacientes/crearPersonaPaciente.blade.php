

<div class="PersonaNueva">

  <form method="POST" action="{{asset('paciente/crearNuevoPersonaPaciente')}}">

{{csrf_field()}}

    <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Apellido Paterno:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" >
      </div>
    </div>



    <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Apellido Materno:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" >
      </div>

    </div>
        <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Nombres:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" >
      </div>
    </div>



    <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">DNI:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" >
      </div>
    </div>

     <div class="form-group">
      <label class="col-sm-2 col-form-label" for="email">Dirección:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion" >
      </div>
    </div>

    <div class="form-group">
     <label class="col-sm-2 col-form-label" for="email">Telefono:</label>
     <div class="col-sm-3">
           <input type="text" class="form-control" id="telefono" placeholder="Ingrese dirección" name="telefono" >
     </div>
   </div>

   <div class="form-group">
    <label class="col-sm-2 col-form-label" for="email">Email:</label>
    <div class="col-sm-3">
          <input type="text" class="form-control" id="email" placeholder="Ingrese dirección" name="email" >
    </div>
  </div>


  <button type="submit" class="btn btn-primary">Guardar</button>


</form>

</div>
