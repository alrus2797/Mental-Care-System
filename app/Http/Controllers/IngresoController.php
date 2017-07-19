<?php

namespace App\Http\Controllers;

use DB;
use Log;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\Ingreso;
use App\Paciente;
use App\Persona;
use App\pacientesEstados;
use App\Historial;
use App\Departamento;

class IngresoController extends Controller
{

    /*
    public function historial(Request $request)
    {
        $ingreso= ingreso::find($request->paciente_id);
        //$id=$paciente->persona->id;
        //$nombre=$paciente->persona->nombres;
        //$apellidos=$paciente->persona->apellidopaterno." ".$paciente->persona->apellidomaterno;
        //return view('pacientes.historial',["id"=>$paciente->id,"nombre"=>$nombre,"apellidos"=>$apellidos]);

        if ($ingreso)
          return view('pacientes.historial',["paciente_id"=>$request->paciente_id]);
        else
          return "No se ha encontrado paciente";
    }
    */

    public function todos(Request $request)
    {

      $tabla = DB::table('ingresos')
              ->join('personas','ingresos.persona_id','=','personas.id')
              -> select('ingresos.*', 'personas.*', 'ingresos.id as ing_id')
              ->orderBy('ingresos.id', 'desc')
              ->paginate(20);


      if($request->ajax()){


        return response()->json(view('pacientes.todosPartial',['tabla'=>$tabla])->render());
      }


      return view('ingresos.todos',compact('tabla'));

    }

    /*
    public function mostrar($id)
    {
      $paciente = paciente::find($id);
      $persona = persona::find($paciente -> persona_id);
      $estado = pacientesEstados::find($paciente->estado_id);
      $departamento = departamento::find($paciente->departamento_id);
      //return $tabla;
      return view('pacientes.mostrar',compact('paciente', 'persona','estado','departamento'));
    }*/

    public function crearObt()
    {
      return view('ingresos.crear');
    }


    public function agregar()
    {

      $post = new ingreso;

      $post->persona_id = request('id');
      $post->fecha = request('fecha');

      //$historial = new historial;

      //$historial -> save();

      //$post->historials_id = $historial -> id;

      $post->save();

      $per = persona::find(request('id'));

      $per->apellidopaterno = request('apellidopaterno');
      $per->apellidomaterno = request('apellidomaterno');
      $per->nombres = request('nombres');
      $per->dni = request('dni');
      $per->direccion = request('direccion');
      $per->telefono = request('telefono');
      $per->email = request('email');
      $per->sexo = request('sexo');
      $per->fechanacimiento = request('fechanacimiento');
      $per->save();

      //$ingreso= new App\Ingreso;
      //$ingreso->paciente_id= $per->id;
      //$per->ingresos()->attach($ingreso);

      return redirect('ingresos');

    }

    public function crearNuevaPersona()
    {

      $estados = pacientesEstados::all();
      $departamentos = departamento::all();
      return response()->json(view('ingresos.crearPersonaPaciente',compact('estados','departamentos'))->render());

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
      $per->sexo = request('sexo');
      $per->fechanacimiento = request('fechanacimiento');
      $per->save();

      $post = new paciente;

      $post->persona_id = $per->id;
      $post->estado_id = request('estado');
      $post->departamento_id = request('departamento');
      //$historial = new historial;

      //$historial -> save();

      //$post->historials_id = $historial -> id;

      $post->save();





      return redirect('pacientes');

    }

    public function editar($id)
    {

      $get = ingreso::find($id);
      $getPersona = persona::find($get->persona_id);
      $estados = pacientesEstados::all();
      $departamentos = departamento::all();
      return view('ingresos.editar',compact('get','getPersona','estados','departamentos'));

    }


    public function guardar()
    {

      $post = persona::find(request('id'));
      $ing = ingreso::find(request('ingreso_id'));


      $post->apellidopaterno = request('apellidopaterno');
      $post->apellidomaterno = request('apellidomaterno');
      $post->nombres = request('nombres');
      $post->dni = request('dni');
      $post->direccion = request('direccion');
      $post->telefono = request('telefono');
      $post->email = request('email');
      $post->sexo = request('sexo');
      $post->fechanacimiento = request('fechanacimiento');
      $ing->fecha = request('fecha');
      $post->save();
      $ing->save();

      return redirect('ingresos');

    }


    public function eliminarConfirm($id){
      $get = ingreso::find($id);
      $getPersona = persona::find($get->persona_id);
      //$estado = pacientesEstados::find($get->estado_id);
      //$departamento = departamento::find($get->departamento_id);
      return view('ingresos.eliminar',compact('get','getPersona'));
    }

    public function eliminar(){
      $post = ingreso::find(request('id'));
      $post->delete();
      return redirect('ingresos');
    }

    public function buscar()
    {
      return view('ingresos.buscar');
    }

    public function retrievePacientes(Request $datos)
    {
      $respuesta = DB::table('pacientes')
                  -> join('personas', 'personas.id', '=', 'pacientes.persona_id')
                  -> join('pacientes_estados', 'pacientes.estado_id', '=', 'pacientes_estados.id')
                  -> select('pacientes.*', 'pacientes.id as pac_id', 'personas.*', 'pacientes_estados.nombre as nombre_estado')
                  -> where([
                    ['personas.nombres', 'like', '%'.$datos->input('nombres').'%'],
                    ['personas.apellidopaterno', 'like', '%'.$datos->input('apellidoP').'%'],
                    ['personas.apellidomaterno', 'like', '%'.$datos->input('apellidoM').'%'],
                    ['personas.dni', 'like', '%'.$datos->input('DNI').'%'],
                    ['personas.telefono', 'like', '%'.$datos->input('telefono').'%']
                    ])
                  -> get();

      return response()->json(view('pacientes.busqueda', compact('respuesta'))->render());
    }

    public function retrievePersonasDNI(Request $datos)
    {
      $respuesta = DB::table('personas')
                  -> leftJoin('pacientes', 'pacientes.persona_id', '=', 'personas.id')
                  -> select('*', 'personas.id as id','pacientes.id as pac_id')
                  -> where([
                    ['personas.nombres', 'like', '%'.$datos->input('nombres').'%'],
                    ['personas.apellidopaterno', 'like', '%'.$datos->input('apellidoP').'%'],
                    ['personas.apellidomaterno', 'like', '%'.$datos->input('apellidoM').'%'],
                    ['personas.dni', 'like', '%'.$datos->input('DNI').'%']
                    ])
                -> get();
      //$respuesta = persona::all();
      return response()->json(view('ingresos.busquedaDNI', compact('respuesta'))->render());
      //return view('personas.busquedaDNI', compact('respuesta');
    }

    public function llenarPaciente(Request $datos)
    {
      //$respuesta = persona::all();

      $respuesta = persona::find($datos->input('id'));

      $estados = pacientesEstados::all();
      $departamentos = departamento::all();

      return response()->json(view('ingresos.formPaciente', compact('respuesta','estados','departamentos'))->render());
      //return view('personas.busquedaDNI', compact('respuesta');

    }
}
