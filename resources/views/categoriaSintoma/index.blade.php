@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<i class="fa fa-list"></i> Categorias Sintomas
                	<div class="pull-right">
						<a href="{{route('categoriaSintoma.create')}}" class="btn btn-primary btn-xs pull-right"> <i class="fa fa-plus-circle"></i> Nuevo</a>
                	</div>
                </div>

                <div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>No.</th>
								<th>Nombre</th>
								<th>Sintomas</th>
								<th>Editar</th>
								<th>Eliminar</th>
							</tr>
						</thead>
						<tbody>
							<?php $num = 1; ?>
							@foreach($categorias as $categoria)
								<tr>
									<td>{{$num++}}</td>
									<td>{{$categoria->nombre}}</td>
									<td>{{$categoria->sintomasCount()}}</td>
									<td>
										<a href="{{route('categoriaSintoma.edit',$categoria->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
									</td>
									<td>
										@if($categoria->sintomasCount()==0)
										<form class="" action="{{route('categoriaSintoma.destroy',$categoria->id)}}" method="post">
											<input type="hidden" name="_method" value="delete">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<button type="submit" class="btn btn-danger" onclick="return confirm('Esta seguro de eliminar este registro?');"><i class="fa fa-trash"></i></button>
										</form>
										@else
										Tiene sintomas asociados
										@endif
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