<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\paciente;

class pacientesController extends Controller
{

    public function todos()
    {
      //X-Total-Count
      $tabla = paciente::all();
      //$tabla = paciente::all()->paginate(X-Total-Count);
      //return $tabla;
      return view('pacientes.todos',compact('tabla'));

    }

    public function mostrar($id)
    {


      $tabla = paciente::find($id);
      //return $tabla;
      return view('pacientes.mostrar',compact('tabla'));

    }

    public function crearObt()
    {

      return view('pacientes.crear');

    }


    public function crear()
    {

      $post = new paciente;

      $post->historiaclinica = request('historiaclinica');
      $post->apellidopaterno = request('apellidopaterno');
      $post->apellidomaterno = request('apellidomaterno');
      $post->nombres = request('nombres');
      $post->dni = request('dni');
      $post->direccion = request('direccion');

      $post->save();
      //paciente::create(request(['historiaclinica','apellidopaterno','apellidomaterno',
        //'nombres','dni','direccion']));
      return redirect('pacientes');

    }


    public function editar($id)
    {

      $get = paciente::find($id);

      return view('pacientes.editar',compact('get'));

    }


    public function guardar()
    {

      $post = paciente::find(request('id'));

      $post->historiaclinica = request('historiaclinica');
      $post->apellidopaterno = request('apellidopaterno');
      $post->apellidomaterno = request('apellidomaterno');
      $post->nombres = request('nombres');
      $post->dni = request('dni');
      $post->direccion = request('direccion');

      $post->save();
      return redirect('pacientes/'.request('id'));

    }


    public function eliminarConfirm($id){
      $get = paciente::find($id);
      return view('pacientes.eliminar',compact('get'));
    }

    public function eliminar(){
      $post = paciente::find(request('id'));
      $post->delete();
      return redirect('pacientes');
    }
}
