@extends('layouts.app')
@section('title', 'Alergias')

@section('content')
<h2>Alergias por Paciente</h2><br><br>
<table class="table">
  <thead>
    <th>Nombre de Alergénico</th>
  </thead>
  <tbody>
    @foreach($alergias as $a)
      <tr><td>{{$a->nombre}}</td></tr>
    @endforeach
  </tbody>
</table>
@endsection
