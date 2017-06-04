
@extends('layouts.prescriptionsTemplate')

@section('title','Agregar presentacion')

@section('content')


<form method="post" id="form" action="{{asset('presentacion')}}">
	{{ csrf_field()}}

	<div class="row">
  		<div class="col-md-4 col-md-offset-3">

		<h2><p class="text-center">  Agregar presentación </p></h2>
		<br>

	  <div class="row">
			<div class="col-sm-12">
				<label for="nomPres" >Nombre de la Presentación: </label>
				<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">
							<span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
						</span>
			  		<input class="form-control" type="text" name ="nomPres" id="nomPres" placeholder="Ingrese nombre de la presentacion" required="">
				</div>
			    <div id="EnomPres" ></div>
			</div>
	  </div><br>

	  <div class="row">
			<div class="col-sm-12">
				<label for="Descripcion" > Descripción: </label>
				<div class="input-group">
						<span class="input-group-addon" id="basic-addon1">
							<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
						</span>
	        		<textarea class="form-control" placeholder="Ingrese la descripción de la presentación"  name="Descripcion" id="Descripcion" rows="5" required="true"></textarea>
				</div>
			    <div id="EnomDescripcion" ></div>
			</div>
	  </div><br>

	      <div class="text-center">
	      	<button class="btn btn-lg btn-primary btn-primary" type="submit" value="Submit"> Agregar presentacion</button>
	      </div>

		</div>
	</div>

</form>

@endsection