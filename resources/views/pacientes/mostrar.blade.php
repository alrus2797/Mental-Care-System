

@extends('layouts.prescriptionsTemplate')
@section('title', 'Ver Paciente')

@section('content')

{{$tabla -> historiaclinica}}

{{$tabla -> nombres}}

{{$tabla -> apellidopaterno}}

{{$tabla -> apellidomaterno}}

{{$tabla -> dni}}

{{$tabla -> direccion}}


@endsection
