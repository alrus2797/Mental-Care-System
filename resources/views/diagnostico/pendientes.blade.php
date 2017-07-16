@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<i class="fa fa-user-md"></i> Diagnosticos Pendientes
                	<div class="pull-right">
						<a href="{{route('diagnostico.create')}}" class="btn btn-primary btn-xs pull-right"> <i class="fa fa-plus-circle"></i> Nuevo</a>
                	</div>
                </div>

                <div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>Paciente</th>
								<th>Edad</th>
								<th>Fecha</th>
								<th>Hora</th>
								<th>Pendiente</th>
								<th>Eliminar</th>
							</tr>
						</thead>
						<tbody>
							<?php $num = 1; ?>
							@foreach($diagnosticos as $diagnostico)
								<tr>
									<td>{{$num++}}</td>
									<td>{{$diagnostico->paciente->nombre_completo()}}</td>
									<td>{{$diagnostico->paciente->edad()}}</td>
									<td>{{$diagnostico->fecha_creacion()}}</td>
									<td>{{$diagnostico->hora_creacion()}}</td>
									<td>
										<a href="{{route('diagnostico.edit',$diagnostico->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
									</td>
									<td>
										<form class="" action="{{route('diagnostico.destroy',$diagnostico->id)}}" method="post">
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