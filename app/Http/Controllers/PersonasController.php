<?php

namespace App\Http\Controllers;

use DB;
use Log;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\persona;

class personasController extends Controller
{

    public function todos()
    {

      //X-Total-Count
      $tabla = persona::all();
      //$tabla = paciente::all()->paginate(X-Total-Count);
      //return $tabla;
      return view('personas.todos',compact('tabla'));


    }

    public function mostrar($id)
    {

      $tabla = persona::find($id);
      //return $tabla;
      return view('personas.mostrar',compact('tabla'));

    }

    public function crearObt()
    {

      return view('personas.crear');

    }


    public function crear()
    {

      $post = new persona;

      $post->apellidopaterno = request('apellidopaterno');
      $post->apellidomaterno = request('apellidomaterno');
      $post->nombres = request('nombres');
      $post->dni = request('dni');
      $post->direccion = request('direccion');
      $post->telefono = request('telefono');
      $post->email = request('email');

      $post->save();
      //paciente::create(request(['historiaclinica','apellidopaterno','apellidomaterno',
        //'nombres','dni','direccion']));
      return redirect('personas');

    }


    public function editar($id)
    {
      $get = persona::find($id);

      return view('personas.editar',compact('get'));
    }


    public function guardar()
    {
      $post = persona::find(request('id'));

      $post->apellidopaterno = request('apellidopaterno');
      $post->apellidomaterno = request('apellidomaterno');
      $post->nombres = request('nombres');
      $post->dni = request('dni');
      $post->direccion = request('direccion');
      $post->telefono = request('telefono');
      $post->email = request('email');

      $post->save();

      return redirect('personas/'.request('id'));
    }


    public function eliminarConfirm($id){
      $get = persona::find($id);
      return view('personas.eliminar',compact('get'));
    }

    public function eliminar(){
      $post = persona::find(request('id'));
      $post->delete();
      return redirect('pacientes');
    }

    public function buscar()
    {

    }

    public function retrievePersonas(Request $datos)
    {

    }

}
