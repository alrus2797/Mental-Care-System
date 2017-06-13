@extends('layouts.prescriptionsTemplate')
@section('title','medicamentos')

@section('content')

<h1>All Medicamentos</h1>

 <table class="table table-condensed">
    <thead>
      <tr>
        <th>id</th>
        <th>Nombre</th>
        <th>Presentacion</th>
        <th>Cantidad</th>
        <th>Unidad</th>
        <th>Ver</th>
        <th>Edi</th>
        <th>Elimi</th>
      </tr>
    </thead>
    <tbody>
    @foreach($medicinas as $m)
      <tr>
        <td>{{$m->id}}</td>
        <td>{{$m->medicamento->nombre}}</td>
        <td>{{$m->presentacion->descripcion}}</td>
        <td>{{$m->cantidad}}</td>
        <td>{{$m->presentacion->unidad}}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
@endsection

