<ul>
    @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
    @endforeach
</ul>
<style>
    .inputs{
        width:80%;
        margin-left: 10%;
    }
    .titles{
        width: 50%;
    }
</style>

<table class="table table-bordered table-striped">
    <tbody>
    <tr>
        <td class="titles">{!! Form::label('apellidoPaterno', 'Apellido Paterno :', ['class' => 'awesome']) !!}</td>
        <td>{!!  Form::text('apellidoPaterno','',['class' => 'form-control inputs']) !!}</td>
    </tr>
    <tr>
        <td class="titles">{!! Form::label('apellidoMaterno', 'Apellido Materno :', ['class' => 'awesome']) !!}</td>
        <td>{!!  Form::text('apellidoMaterno','',['class' => 'form-control inputs']) !!}</td>
    </tr>
    <tr>
        <td class="titles">{!! Form::label('nombres', 'Nombres :', ['class' => 'awesome']) !!}</td>
        <td>{!!  Form::text('nombres','',['class' => 'form-control  inputs']) !!}</td>
    </tr>
    <tr>
        <td class="titles"> {!!  Form::label('fechaNacimiento', 'Fecha de Nacimiento :') !!}</td>
        <td>{!!  Form::date('fechaNacimiento', \Carbon\Carbon::now(),['class' => 'form-control  inputs']) !!}</td>
    </tr>
    <tr>
        <td class="titles">{!! Form::label('sexo','Sexo :') !!}</td>
        <td>{!!  Form::select('sexo', ['M' => 'Masculino', 'F' => 'Femenino'], null, ['placeholder' => '--','class' => 'form-control  inputs'])!!}</td>
    </tr>
    <tr>
        <td class="titles">{!! Form::label('estadoCivil','Estado Civil :') !!}</td>
        <td>{!!  Form::select('estadoCivil', ['S' => 'Soltero', 'C' => 'Casado','V'=>'Viudo','D'=>'Dotero'], null, ['placeholder' => '--','class' => 'form-control  inputs'])!!}</td>
    </tr>
    <tr>
        <td class="titles">{!! Form::label('tipoDocuento','Tipo Documento :') !!}</td>
        <td>{!!  Form::select('tipoDocumento', ['DNI' => 'DNI', 'PASAPORTE' => 'PASAPORTE'], null, ['placeholder' => '--','class' => 'form-control  inputs'])!!}</td>
    </tr>
    <tr>
        <td class="titles">{!! Form::label('documento', 'Documento :', ['class' => 'awesome']) !!}</td>
        <td>{!!  Form::text('documento','',['class' => 'form-control  inputs']) !!}</td>
    </tr>
    <tr>
        <td class="titles">{!! Form::label('direccion', 'Direccion :', ['class' => 'awesome']) !!}</td>
        <td>{!!  Form::text('direccion','',['class' => 'form-control  inputs']) !!}</td>
    </tr>
    <tr>
        <td class="titles">{!! Form::label('telefono', 'Telefono :', ['class' => 'awesome']) !!}</td>
        <td>{!!  Form::text('telefono','',['class' => 'form-control  inputs']) !!}</td>
    </tr>
    <tr>
        <td class="titles">{!! Form::label('celular1', 'Celular :', ['class' => 'awesome']) !!}</td>
        <td>{!!  Form::text('celular1','',['class' => 'form-control  inputs']) !!}</td>
    </tr>
    <tr>
        <td class="titles">{!! Form::label('celular2', 'Celular Referencial :', ['class' => 'awesome']) !!}</td>
        <td>{!!  Form::text('celular2','',['class' => 'form-control  inputs']) !!}</td>
    </tr>
    </tbody>
</table>
