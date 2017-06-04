@extends('layouts.prescriptionsTemplate')

@section('title','Agregar presentacion')

@section('content')

<div class="row">

<form method="post" id="form" action="{{asset('medicamentos/'.$medicamento->id.'/crearPresentacion')}}" >
	{{ csrf_field()}}

		<div class="col-md-10">

				<h2><p class="text-center">  Agregar presentación </p></h2>
				<br>

			<div class="col-md-1">
			</div>				

			<div class="col-md-6">	

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
			  			<label for="modelo" > Modelo de presentación: </label>
				   			<select name="modelo" type="text" class="form-control" id="id_modelo">
			                	<option value="" >Seleccionar modelo de presentación:</option>
			                		@foreach ($modelos as $modelo)
			          					<option value="{{$modelo->id}}" >{{$modelo->nombre}}</option>
			        				@endforeach
			        		</select>
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

		<div class="col-md-4">
			<table class="table table-hover">
			    <thead>
			      <tr>
			        <th>Presentaciones</th>
			        <th>Tipo</th>
			        <th>Descripción</th>
			      </tr>
			    </thead>

			    <tbody>
			    	@foreach($medicamento->presentaciones as $presentacion)
			    	<tr>
						<td>{{$presentacion -> nombre}}</td>
						<td>{{$presentacion -> modeloPresentacion-> nombre }}</td>
						<td>{{$presentacion -> descripcion}}</td>
				    </tr>
				   	@endforeach
			    </tbody>
			  </table>
		</div>

	</div>

</form>

<form method="get" action="{{asset('medicamentos')}}">
	{{ csrf_field()}}

	<div class="row">
		<div class="col-md-10">
			<div class="col-md-1">	</div>		
			<div class="col-md-6">	</div>				

			<div class="col-md-4">	
					<div class="text-center">
						<button class="btn btn-success btn-lg" type="submit" value="Submit"> Finalizar</button>
					</div>
			</div>
		</div>
	</div>
	<br><br><br>
</form>

</div>
@endsection