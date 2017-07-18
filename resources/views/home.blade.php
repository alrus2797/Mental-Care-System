@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><i class="fa fa-home"></i> Inicio
                @if (Auth::guest())
                    <span class=" pull-right badge">Debes iniciar sesion, antes de continuar</span>
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection