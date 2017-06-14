@extends('layouts.template')

@section('content')

   <b> Editar PACIENTE N° {{$paciente->id}}</b>

   {!! Form::model($paciente, ['route' => ['paciente_update', $paciente->id]]) !!}
   {{ method_field('PATCH') }}
         @include('Paciente/Forms/nuevo_paciente')
   {!! Form::submit('Editar') !!}
   {!! Form::close() !!}
@endsection
