@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row">
	        <div class="col-md-10 col-md-offset-1">
	            <div class="panel panel-default">
	                <div class="panel-heading">
	                	<i class="fa fa-users"></i> Usuarios
	                	<div class="pull-right">
							<a href="{{route('usuarios.create')}}" class="btn btn-primary btn-xs pull-right"> <i class="fa fa-plus-circle"></i> Nuevo</a>
	                	</div>
	                </div>

	                <div class="panel-body">
						<table class="table table-striped">
							<thead>
								<tr>
									<th>No.</th>
									<th>Nombre</th>
									<th>DNI</th>
									<th>Exp</th>
									<th>Correo electronico</th>
									<th>Tipo</th>
									<th>Pass.</th>
									<th>Editar</th>
									<th>Eliminar</th>
								</tr>
							</thead>
							<tbody>
								<?php $num = 1; ?>
								@foreach($users as $user)
									<tr>
										<td>{{$num++}}</td>
										<td>
											{{$user->name}}
											@if($user->especialidad)
											<div class="especialidad">
												<span class="label label-primary">{{$user->especialidad->nombre}}</span>
											</div>
											@endif
										</td>
										<td>{{$user->documento}}</td>
										<td>
											@if($user->departamento)
												{{$user->departamento->abreviatura}}
											@endif
										</td>
										<td>{{$user->email}}</td>
										<td>
											{{$user->tipo_usuario}}
											@if($user->turno)
											<div class="turno">
												<div class="turno">
													<span class="label label-success">
														{{$user->turno->nombre}}
													</span>
												</div>
											</div>
											@endif
										</td>
										<td>
											<a href="{{route('updatepassview',$user->id)}}" class="btn btn-info"><i class="fa fa-key"></i></a>
										</td>
										<td>
											<a href="{{route('usuarios.edit',$user->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
										</td>
										<td>
											<form class="" action="{{route('usuarios.destroy',$user->id)}}" method="post">
												<input type="hidden" name="_method" value="delete">
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<button type="submit" class="btn btn-danger" onclick="return confirm('Esta seguro de eliminar este registro?');"><i class="fa fa-trash"></i></button>
											</form>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection