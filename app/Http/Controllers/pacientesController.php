<?php

namespace App\Http\Controllers;

use DB;
use Log;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\paciente;
use App\persona;
use App\pacientesEstados;
use App\Historial;

class pacientesController extends Controller
{

    public function todos()
    {
      //X-Total-Count
      //$tabla = paciente::all()->paginate(2);
      //$tabla = paciente::with('persona')->get();
      $tabla = DB::table('pacientes');

      //$tabla = paciente::all()->paginate(X-Total-Count);
      //return $tabla;
      return view('pacientes.todos',compact('tabla'));

    }

    public function mostrar($id)
    {
      $paciente = paciente::find($id);
      $persona = persona::find($paciente -> persona_id);

      //return $tabla;
      return view('pacientes.mostrar',compact('paciente', 'persona'));

    }

    public function crearObt()
    {


      return view('pacientes.crear');

    }


    public function agregar()
    {

      $post = new paciente;

      $post->persona_id = request('id');
      $post->estado_id = request('estado');

      $historial = new historial;

      $historial -> save();

      $post->historials_id = $historial -> id;

      $post->save();

      $per = persona::find(request('id'));

      $per->apellidopaterno = request('apellidopaterno');
      $per->apellidomaterno = request('apellidomaterno');
      $per->nombres = request('nombres');
      $per->dni = request('dni');
      $per->direccion = request('direccion');
      $per->telefono = request('telefono');
      $per->email = request('email');

      $per->save();

      return redirect('pacientes');

    }

    public function crearNuevaPersona()
    {

      $estados = pacientesEstados::all();
      return response()->json(view('pacientes.crearPersonaPaciente',compact('estados'))->render());

    }


    public function crearPersonaPaciente()
    {
      $per = new persona;

      $per->apellidopaterno = request('apellidopaterno');
      $per->apellidomaterno = request('apellidomaterno');
      $per->nombres = request('nombres');
      $per->dni = request('dni');
      $per->direccion = request('direccion');
      $per->telefono = request('telefono');
      $per->email = request('email');

      $per->save();

      $post = new paciente;

      $post->persona_id = $per->id;
      $post->estado_id = request('estado');

      $historial = new historial;

      $historial -> save();

      $post->historials_id = $historial -> id;

      $post->save();





      return redirect('pacientes');

    }

    public function editar($id)
    {

      $get = paciente::find($id);
      $getPersona = persona::find($get->persona_id);

      return view('pacientes.editar',compact('get','getPersona'));

    }


    public function guardar()
    {

      $post = persona::find(request('id'));



      $post->apellidopaterno = request('apellidopaterno');
      $post->apellidomaterno = request('apellidomaterno');
      $post->nombres = request('nombres');
      $post->dni = request('dni');
      $post->direccion = request('direccion');

      $post->save();

      return redirect('pacientes/'.request('paciente_id'));

    }


    public function eliminarConfirm($id){
      $get = paciente::find($id);
      $getPersona = persona::find($get->persona_id);
      return view('pacientes.eliminar',compact('get','getPersona'));
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

      $estados = pacientesEstados::all();

      return response()->json(view('pacientes.formPaciente', compact('respuesta'), compact('estados'))->render());
      //return view('personas.busquedaDNI', compact('respuesta');

    }
}
