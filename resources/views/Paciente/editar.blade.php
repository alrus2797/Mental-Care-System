@extends('layouts.template')

@section('content')

   <b> Editar PACIENTE N° {{$paciente->id}}</b>

   {!! Form::model($paciente, ['url' => ['update_paciente']]) !!}
         @include('Paciente/Forms/nuevo_paciente')
   {!! Form::submit('Editar') !!}

   {!! Form::close() !!}
@endsection
