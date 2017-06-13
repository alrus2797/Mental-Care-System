

    {!! Form::label('apellidoPaterno', 'Apellido Paterno', ['class' => 'awesome']) !!}
    {!!  Form::text('apellidoPaterno') !!}
    {!! Form::label('apellidoMaterno', 'Apellido Materno', ['class' => 'awesome']) !!}
    {!!  Form::text('apellidoMaterno') !!}
    {!! Form::label('nombres', 'nombres', ['class' => 'awesome']) !!}
    {!!  Form::text('nombres') !!}<br>
    {!!  Form::label('fechaNacimiento', 'fechaNacimiento') !!}
    {!!  Form::date('fechaNacimiento', \Carbon\Carbon::now()) !!}
    {!! Form::label('sexo','Sexo') !!}
    {!!  Form::select('sexo', ['M' => 'Masculino', 'F' => 'Femenino'], null, ['placeholder' => '--'])!!}
    {!! Form::label('estadoCivil','Estado Civil') !!}
    {!!  Form::select('estadoCivil', ['S' => 'Soltero', 'C' => 'Casado','V'=>'Viudo','D'=>'Dotero'], null, ['placeholder' => '--'])!!}
    <br>
{!! Form::label('tipoDocuento','Tipo Documento') !!}
{!!  Form::select('tipoDocumento', ['DNI' => 'DNI', 'PASAPORTE' => 'PASAPORTE'], null, ['placeholder' => '--'])!!}

{!! Form::label('documento', 'documento', ['class' => 'awesome']) !!}
    {!!  Form::text('documento') !!}
    <br>
{!! Form::label('direccion', 'Direccion', ['class' => 'awesome']) !!}
{!!  Form::text('direccion') !!}
<br>
    {!! Form::label('telefono', 'telefono', ['class' => 'awesome']) !!}
    {!!  Form::text('telefono') !!}
    {!! Form::label('celular1', 'Celular', ['class' => 'awesome']) !!}
    {!!  Form::text('celular1') !!}
    {!! Form::label('celular2', 'Celular Referencial', ['class' => 'awesome']) !!}
    {!!  Form::text('celular2') !!}


<br>



