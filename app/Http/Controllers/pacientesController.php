<?php

namespace App\Http\Controllers;

use DB;
use Log;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\paciente;
use App\persona;

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


    public function agregar($Request)
    {

      $post = new paciente;

      $post = persona::find();

      $post->persona_id = request('id');
      $post->estado_id = '1';
      $post->historials_id = '12';


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

    public function buscar()
    {
      return view('pacientes.buscar');
    }

    public function retrievePacientes(Request $datos)
    {
      $respuesta = DB::table('pacientes')
                  -> select('id', 'nombres', 'apellidopaterno', 'apellidomaterno', 'dni', 'direccion', 'historiaclinica')->where([
                    ['nombres', 'like', '%'.$datos->input('nombres').'%'],
                    ['apellidopaterno', 'like', '%'.$datos->input('apellidoP').'%'],
                    ['apellidomaterno', 'like', '%'.$datos->input('apellidoM').'%'],
                    ['dni', 'like', '%'.$datos->input('DNI').'%'],
                    ['direccion', 'like', '%'.$datos->input('direccion').'%'],
                    ['historiaclinica', 'like', '%'.$datos->input('historia').'%'],
                    ])
                  ->get();
      return response()->json(view('pacientes.busqueda', compact('respuesta'))->render());
    }

    public function retrievePersonasDNI(Request $datos)
    {
      $respuesta = DB::table('personas')
                  -> select('id', 'nombres', 'apellidopaterno', 'apellidomaterno', 'dni', 'direccion','telefono','email')
                  -> where( 'dni', 'like', '%'.$datos->input('DNI').'%')
                -> get();
      //$respuesta = persona::all();
      return response()->json(view('pacientes.busquedaDNI', compact('respuesta'))->render());
      //return view('personas.busquedaDNI', compact('respuesta');
    }

    public function llenarPaciente(Request $datos)
    {
      //$respuesta = persona::all();

      $respuesta = persona::find($datos->input('id'));
      /*$respuesta = array("id" => $datos->input('id'),
                         "nombres" => $datos->input('nombres'),
                         "apellidopaterno" => $datos->input('apellidoP'),
                         "apellidomaterno" => $datos->input('apellidoM'),
                         "dni" => $datos->input('DNI'),
                         "direccion" => $datos->input('direccion'),
                         "telefono" => $datos->input('telefono'),
                         "email" => $datos->input('email'));*
      //$respuesta_json = json_encode($respuesta);
      /*$respuesta_final = new stdClass(array("id" => $datos->input('id'),
                                     "nombres" => $datos->input('nombres'),
                                     "apellidopaterno" => $datos->input('apellidoP'),
                                     "apellidomaterno" => $datos->input('apellidoM'),
                                     "dni" => $datos->input('DNI'),
                                     "direccion" => $datos->input('direccion'),
                                     "telefono" => $datos->input('telefono'),
                                     "email" => $datos->input('email') ));*/

      return response()->json(view('pacientes.formPaciente', compact('respuesta'))->render());
      //return view('personas.busquedaDNI', compact('respuesta');

    }
}
