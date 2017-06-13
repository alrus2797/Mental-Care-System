@extends('layouts.prescriptionsTemplate')
@section('title','medicamentos')

@section('content')

	<h2>Nuevo Medicamento</h2>
<form action="{{ asset('medicamentos')  }}" method="post">
{{ csrf_field()}} 
<div class="row">
	<div class="form-group col-md-4">
		<label for="nombre">Nombre</label>
		<input type="text" class="form-control" id="nombre" name="nombre">
	</div>
	<div class="form-group col-md-3">
		<label for="cantidad">Cantidad</label>
		<input type="number" class="form-control" id="cantidad" name="cantidad">
	</div>

	<div class="form-group col-md-3">
		<label for="presentacion">Presentación</label>
		<select class="form-control" name="presentacion" id="presentacion">
			@foreach ($presentaciones as $p)
			<option value="{{ $p->id }}">{{ $p->unidad}} {{ $p->descripcion}}</option>
			@endforeach
		</select>
	</div>
	
	<div class="form-group col-md-2">
		<button type="button" class="btn btn-info btn-lg">Nueva Presentación</button>		
	</div>
</div>
<div class="row">
	<div class="form-group col-md-4">
		<label for="descripcion">Descripción</label>
		<textarea id="descripcion" class="form-control" rows="5" name="descripcion"></textarea>
	</div>

	<div class="form-group col-md-4">
		<label for="efectos">Efectos Secundarios</label>
		<textarea id="efectos" class="form-control" rows="5" name="efectos"></textarea>
	</div>
	<div class="form-group col-md-4">
		<label for="adversos">Efectos Adversos</label>
		<textarea id="adversos" class="form-control" rows="5" name="adversos"></textarea>
	</div>
</div>

	<button type="submit" class="btn btn-default">Crear Medicamento</button>
</form>


@endsection