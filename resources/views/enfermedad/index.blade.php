@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<i class="fa fa-crosshairs"></i> Enfermedades
                	<div class="pull-right">
						<a href="{{route('enfermedad.create')}}" class="btn btn-primary btn-xs pull-right"> <i class="fa fa-plus-circle"></i> Nuevo</a>
                	</div>
                </div>

                <div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Casos</th>
								<th>Sintomas</th>
								<th>Editar</th>
								<th>Eliminar</th>
							</tr>
						</thead>
						<tbody>
							<?php $num = 1; ?>
							@foreach($enfermedades as $enfermedad)
								<tr>
									<td>{{$num++}}</td>
									<td>
										{{$enfermedad->nombre}}
										@if($enfermedad->especialidad)
										<div class="especialidad">
											<span class="label label-primary">{{$enfermedad->especialidad->nombre}}</span>
										</div>
										@endif
									</td>
									<td>
										<p>{{$enfermedad->descripcion}}</p>
									</td>
									<td>
										{{$enfermedad->diagnosticosCount()}}
									</td>
									<td>
										<div class="sintomas">
											@foreach($enfermedad->sintomas as $sintoma)
												<span class="label label-default">{{$sintoma->nombre}}</span>
											@endforeach
										</div>
									</td>
									<td>
										<a href="{{route('enfermedad.edit',$enfermedad->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
									</td>
									<td>
										<form class="" action="{{route('enfermedad.destroy',$enfermedad->id)}}" method="post">
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