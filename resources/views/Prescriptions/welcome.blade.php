

@extends('layouts.prescriptionsTemplate')
@section('title', 'Prescripciones')


   
   @section('content')      
   	<b>
   		<p>Bienvenido a Prescripciones</p>
   		<p>{{Request::is('prescripcion*')}}</p>
   	</b>

   @endsection