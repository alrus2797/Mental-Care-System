

@extends('layouts.app')
@section('title', 'Prescripciones')



   @section('content')
   	<b>
   		<p>Bienvenido a registros</p>
   		<p>{{Request::is('prescripcion')}}</p>
   	</b>

   @endsection
