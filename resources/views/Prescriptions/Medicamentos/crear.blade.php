
@extends('layouts.prescriptionsTemplate')

@section('title','Agregar medicamento')

@section('content')


<form method="post" id="form" action="{{asset('medicamentos/crear')}}">
	{{ csrf_field()}}

	<div class="row">
  		<div class="col-md-4 col-md-offset-3">

		<h2><p class="text-center">  Agregar Medicamento </p></h2>
		<br>

	  <div class="row">
			<div class="col-sm-12">
				<label for="nomMed" >Nombre del Medicamento: </label>
				<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">
							<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
						</span>
			  		<input class="form-control" type="text" name ="nomMed" id="nomMed" placeholder="Ingrese nombre del medicamento" required="">
				</div>
			    <div id="EnomMed" ></div>
			</div>
	  </div><br>

	  <div class="row">
			<div class="col-sm-12">
				<label for="nomDescrip" >Descripción: </label>
				<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">
							<span class="glyphicon glyphicon-list" aria-hidden="true"></span>
						</span>
	        		<textarea class="form-control" placeholder="Ingrese la descripcion del medicamento"  name="nomDescrip" id="nomDescrip" rows="5" required="true"></textarea>
				</div>
			    <div id="EnomDescrip" ></div>
			</div>
	  </div><br>

	  <div class="row">
			<div class="col-sm-12">
				<label for="nomEfect" >Efectos secundarios: </label>
				<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
						</span>
	        		<textarea class="form-control" placeholder="Ingrese los efectos secundarios"  name="nomEfect" id="nomEfect" rows="5" required="true"></textarea>
				</div>
			    <div id="EnomEfect" ></div>
			</div>
	  </div><br>

	  <div class="row">
			<div class="col-sm-12">
				<label for="nomRiesgo" >Riesgos o precauciones: </label>
				<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">
							<span class="glyphicon glyphicon-warning-sign" aria-hidden="true"></span>
						</span>
			  		<textarea class="form-control" placeholder="Ingrese los riesgos o precauciones"  name="nomRiesgo" id="nomRiesgo" rows="5" required="true"></textarea>
				</div>
			    <div id="EnomRiesgo" ></div>
			</div>
	  </div><br>

	      <div class="text-center">
	      	<button class="btn btn-lg btn-primary btn-primary" type="submit" value="Submit"> Agregar medicamento</button>
	      </div> <br>

		</div>
	</div>

</form>

@endsection