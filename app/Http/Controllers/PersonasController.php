<?php

namespace App\Http\Controllers;

use DB;
use Log;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\Persona;

class personasController extends Controller
{

    public function todos(Request $request)
    {

      //X-Total-Count
      //$tabla = persona::all()->paginate(15);
      $tabla = DB::table('personas')->orderBy('apellidopaterno', 'asc')->paginate(20);
      //$tabla = paciente::all()->paginate(X-Total-Count);
      //return $tabla;

      if($request->ajax()){
        //dd($personal);

        return response()->json(view('personas.todosPartial',['tabla'=>$tabla])->render());
      }



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
      $post->sexo = request('sexo');
      $post->fechanacimiento = request('sexo');
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
      return redirect('personas');
    }

    public function buscar()
    {
      return view('personas.buscar');
    }

    public function retrievePersonas(Request $datos)
    {
      $respuesta = DB::table('personas')
                  -> select('id', 'nombres', 'apellidopaterno', 'apellidomaterno', 'dni', 'direccion','telefono','email')->where([
                    ['nombres', 'like', '%'.$datos->input('nombres').'%'],
                    ['apellidopaterno', 'like', '%'.$datos->input('apellidoP').'%'],
                    ['apellidomaterno', 'like', '%'.$datos->input('apellidoM').'%'],
                    ['dni', 'like', '%'.$datos->input('DNI').'%'],
                    ['direccion', 'like', '%'.$datos->input('direccion').'%'],
                    ['telefono', 'like', '%'.$datos->input('telefono').'%'],
                    ['email', 'like', '%'.$datos->input('email').'%'],
                    ])
                  ->get();
      return response()->json(view('personas.busqueda', compact('respuesta'))->render());
    }
    /*
    public function retrievePersonas(Request $datos)
    {
      $respuesta = DB::table('personas')
                  -> select('id', 'nombres', 'apellidopaterno', 'apellidomaterno', 'dni', 'direccion','telefono','email')
                  -> where( 'dni', 'like', '%'.$datos->input('DNI').'%')
                  ->get();
      return response()->json(view('personas.busqueda', compact('respuesta'))->render());
    }
    */


}
