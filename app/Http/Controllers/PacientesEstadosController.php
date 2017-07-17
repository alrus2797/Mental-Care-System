<?php

namespace App\Http\Controllers;

use App\pacientesEstados;
use Illuminate\Http\Request;


class PacientesEstadosController extends Controller
{

  public function todos()
  {

    //X-Total-Count
    $tabla = pacientesEstados::all();
    //$tabla = paciente::all()->paginate(X-Total-Count);
    //return $tabla;
    return view('pacientesEstado.todos',compact('tabla'));


  }

  public function mostrar($id)
  {

    $tabla = pacientesEstados::find($id);
    //return $tabla;
    return view('pacientesEstado.mostrar',compact('tabla'));

  }

  public function crearObt()
  {

    return view('pacientesEstado.crear');

  }


  public function crear()
  {

    $post = new pacientesEstados;

    $post->nombre = request('nombre');

    $post->save();
    //paciente::create(request(['historiaclinica','apellidopaterno','apellidomaterno',
      //'nombres','dni','direccion']));
    return redirect('pacientes/estados/todos');

  }


  public function editar($id)
  {
    $get = pacientesEstados::find($id);

    return view('pacientesEstados.editar',compact('get'));
  }


  public function guardar()
  {
    $post = pacientesEstados::find(request('id'));

    $post->nombre = request('nombre');

    $post->save();

    return redirect('pacientes/estados/'.request('id'));
  }


  public function eliminarConfirm($id){
    $get = pacientesEstados::find($id);
    return view('pacientesEstado.eliminar',compact('get'));
  }

  public function eliminar(){
    $post = pacientesEstados::find(request('id'));
    $post->delete();
    return redirect('pacientes/estados');
  }

  public function buscar()
  {
    return view('pacientesEstado.buscar');
  }


}
