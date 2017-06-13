@extends('layouts.template')

@section('content')

        <b>Agregar Nuevo Paciente</b>
        {!! Form::open(['url' => 'agregar_paciente','method' => 'post']) !!}
                @include('Paciente/Forms/nuevo_paciente')
                {!! Form::submit('Registrar') !!}
        {!! Form::close() !!}
@endsection