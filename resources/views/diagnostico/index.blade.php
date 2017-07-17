@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<i class="fa fa-medkit"></i> Diagnosticos Realizados
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
								<th>Revisar</th>
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
										<a href="{{route('diagnostico.show',$diagnostico->id)}}" class="btn btn-success"><i class="fa fa-file-text"></i></a>
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