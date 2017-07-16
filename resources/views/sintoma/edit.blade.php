@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                	<i class="fa fa-edit"></i> Editar Sintoma
                </div>

                <div class="panel-body">

                    <form class="form-horizontal" role="form" method="POST" action="{{route('sintoma.update',$sintoma->id)}}" enctype="multipart/form-data">
                    
                        <input name="_method" type="hidden" value="PATCH">
						{{ csrf_field() }}

						<div class="form-group{{ ($errors->has('nombre')) ? $errors->first('nombre') : '' }}">
                            <label for="nombre" class="col-md-4 control-label">Nombre</label>
                            <div class="col-md-6">
    							<input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingresa el nombre aqui" value="{{$sintoma->nombre}}" autofocus>
    							{!! $errors->first('nombre','<p class="help-block">:message</p>') !!}
                            </div>
						</div>

                        <div class="form-group{{ ($errors->has('descripcion')) ? $errors->first('descripcion') : '' }}">
                            <label for="descripcion" class="col-md-4 control-label">Descripcion</label>
                            <div class="col-md-6">
                                <textarea type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Ingresa la descripcion aqui">{{$sintoma->descripcion}}</textarea>
                                {!! $errors->first('descripcion','<p class="help-block">:message</p>') !!}
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('categoria_id') ? ' has-error' : '' }}">
                            <label for="categoria_id" class="col-md-4 control-label">Categoria</label>
                            <div class="col-md-6">
                                <select id="categoria_id" name="categoria_id" class="form-control">
                                    @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}" {{ ($sintoma->categoria_id == $categoria->id) ? 'selected':'' }} >
                                    {{$categoria->nombre}}
                                    </option>
                                    @endforeach
                                </select>
                                @if ($errors->has('categoria_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('categoria_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ ($errors->has('imagen')) ? $errors->first('imagen') : '' }}">
                            <label for="imagen" class="col-md-4 control-label">Imagen</label>
                            <div class="col-md-6">
                                <input type="file" id="imagen" name="imagen" class="form-control" placeholder="Selecciona una imagen para este sintoma">
                                {!! $errors->first('imagen','<p class="help-block">:message</p>') !!}
                            </div>
                        </div>
                        


                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="col-md-6" align="left">
                                    <button type="submit" class="btn btn-block btn-warning">
                                        Editar
                                    </button>
                                </div>
                                <div class="col-md-6" align="right">
                                    <a class="btn btn-default btn-block" href="{{url()->previous()}}">
                                        Cancelar
                                    </a>
                                </div>
                            </div>
                        </div>
                        
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

    {{--{!! Html::script('js/jquery.min.js') !!}--}}

{{--<script type="text/javascript">--}}
    {{--$(document).ready(function() {--}}
        {{--function readURL(input) {--}}
            {{--$('#profile-img-tag').show();--}}
            {{--if (input.files && input.files[0]) {--}}
                {{--var reader = new FileReader();--}}
                {{----}}
                {{--reader.onload = function (e) {--}}
                    {{--$('#profile-img-tag').attr('src', e.target.result);--}}
                {{--}--}}
                {{--reader.readAsDataURL(input.files[0]);--}}
            {{--}--}}
        {{--}--}}
        {{--$("#imagen").change(function(){--}}
            {{--readURL(this);--}}
        {{--});--}}
    {{--});--}}
{{--</script>--}}