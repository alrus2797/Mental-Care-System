

<div class="personaNueva" style="background-color: rgba(0, 0, 0, 0.1); padding: 20px; border-radius: 10px; margin: 30px">

  <form id="register-form2" method="POST" action="{{asset('pacientes/crearPersonaPaciente')}}">

    {{csrf_field()}}

    <div class="form-group col-sm-12">
      <label class="col-sm-2 col-form-label" for="apellidopaterno">Apellido Paterno:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="apellidopaterno" placeholder="Ingrese apellido paterno" name="apellidopaterno" >
      </div>
      <div class="col-sm-2"> </div>
      <label class="col-sm-2 col-form-label" for="apellidomaterno">Apellido Materno:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="apellidomaterno" placeholder="Ingrese apellido materno" name="apellidomaterno" >
      </div>
    </div>

    <div class="form-group col-sm-12">
      <label class="col-sm-2 col-form-label" for="nombres">Nombres:</label>
      <div class="col-sm-3">
            <input type="text" class="form-control" id="nombres" placeholder="Ingrese nombres" name="nombres" >
      </div>
      <div class="col-sm-2"> </div>
          <label class="col-sm-2 col-form-label" for="sexo">Sexo:</label>
      <div class="col-sm-3">
        <select class="form-control" id="sexo" name="sexo">
          <option value="M">Masculino</option>
          <option value="F">Femenino</option>
          <option value="O">Otro</option>
        </select>
      </div>
    </div>

     <div class="form-group col-sm-12">
       <label class="col-sm-2 col-form-label" for="dni">DNI:</label>

       <div class="col-sm-3">
         <input type="text" class="form-control" id="dni" placeholder="Ingrese DNI" name="dni" >
       </div>
       <div class="col-sm-2"> </div>

       <label class="col-sm-2 col-form-label" for="fechanacimiento">Fecha De Nacimiento:</label>
       <div class="col-sm-3">
         <input type="date" class="form-control" placeholder="Ingrese Fecha de Nacimiento" id="fechanacimiento" name="fechanacimiento">
       </div>


   </div>

   <div class="form-group col-sm-12">
      <label class="col-sm-2 col-form-label" for="direccion">Dirección:</label>

     <div class="col-sm-3">
        <input type="text" class="form-control" id="direccion" placeholder="Ingrese dirección" name="direccion" >
     </div>
     <div class="col-sm-2"> </div>

    <label class="col-sm-2 col-form-label" for="telefono">Telefono:</label>
    <div class="col-sm-3">
          <input type="text" class="form-control" id="telefono" placeholder="Ingrese dirección" name="telefono" >
    </div>


  </div>


    <div class="form-group col-sm-12">

      <label class="col-sm-2 col-form-label" for="email">Email:</label>
      <div class="col-sm-3">
          <input type="text" class="form-control" id="email" placeholder="Ingrese Email" name="email" >      </div>
      <div class="col-sm-2"> </div>

      <label class="col-sm-2 col-form-label" for="estado">Estado:</label>
     <div class="col-sm-3">
       <select class="form-control" id="estado" name="estado">
         @foreach ($estados as $estado)
         <option value="{{$estado->id}}">{{$estado->nombre}}</option>
         @endforeach
       </select>
     </div>

    </div>

    <div class="form-group col-sm-12">

        <label class="col-sm-2 col-form-label" for="email">Departamento:</label>
      <div class="col-sm-3">
        <select class="form-control" id="departamento" name="departamento">
          @foreach ($departamentos as $departamento)
          <option value="{{$departamento->id}}">{{$departamento->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-sm-2"> </div>

      <div class="col-sm-3">

      </div>
    </div>


  <button type="submit" class="btn btn-primary">Guardar</button>


</form>

</div>



<script>
$(function() {

$.validator.setDefaults({
  errorClass: 'help-block',
  highlight: function(element) {
    $(element)
      .closest('.form-group')
      .addClass('has-error');
  },
  unhighlight: function(element) {
    $(element)
      .closest('.form-group')
      .removeClass('has-error');
  },
  errorPlacement: function (error, element) {
    if (element.prop('type') === 'checkbox') {
      error.insertAfter(element.parent());
    } else {
      error.insertAfter(element);
    }
  }
});

$.validator.addMethod('strongPassword', function(value, element) {
  return this.optional(element)
    || value.length >= 6
    && /\d/.test(value)
    && /[a-z]/i.test(value);
}, 'Your password must be at least 6 characters long and contain at least one number and one char\'.')

$.validator.addMethod('strongDNI',function(value,element){
  return this.optional(element)
  || value.length == 8;
},"ingreso un DNI <em>valido</em>\.")

$("#register-form2").validate({
  rules: {
    email: {
      required: true,
      email: true
    },
    apellidopaterno: {
      required: true,
      nowhitespace: true,
      lettersonly: true
    },
    apellidomaterno: {
      required: true,
      nowhitespace: true,
      lettersonly: true
    },
    dni: {
      required: true,
      strongDNI: true
    },
    nombres: {
      required: true
    },
    telefono: {
      required: true,
      digits: true,

    },
    direccion: {
      required: true
    }
  },
  messages: {
    email: {
      required: 'Este espacio es requerido.',
      email: 'Ingrese un correo electronico <em>valido</em>.'
    },
    dni: {
      required: 'Este espacio es requerido.',
      dni: 'Ingrese un dni <em>valido</em>.',
      strongDNI: 'Ingrese un dni <em>valido</em>.'
    },
    apellidopaterno: {
      required: 'Este espacio es requerido.',
      nowhitespace: 'No se permiten espacios en blanco.',
      lettersonly: 'Solo letras.'
    },
    apellidomaterno: {
      required: 'Este espacio es requerido.',
      nowhitespace: 'No se permiten espacios en blanco.',
      lettersonly: 'Solo letras.'
    },
    nombres: {
      required: 'Este espacio es requerido.'
    },
    telefono: {
      required: 'Este espacio es requerido.',
      digits: 'Ingrese solo numeros.'
    },
    direccion: {
      required: 'Este espacio es requerido.'
    }
  }
});

});

</script>
