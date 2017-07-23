<?php

namespace App\Http\Controllers;

use DB;
use Log;
use App\Http\Requests;
use Illuminate\Http\Request;

use App\Paciente;
use App\Persona;
use App\pacientesEstados;
use App\Historial;
use App\Departamento;
use App\Componente;

class pacientesController extends Controller
{


    public function historial($id)
    {
        $paciente= paciente::find($id);
        if ($paciente)
        {

          $nombre=$paciente->persona->nombres;

          $apellidos=$paciente->persona->apellidopaterno." ".$paciente->persona->apellidomaterno;
          $alergias_comp=$paciente->componentes;
          $alergias=collect([]);
          foreach ($alergias_comp as $a) {
              $alergias->push($a->medicamentos);
          }
          $alergias=$alergias->collapse()->pluck('id')->unique()->all();
          return view('pacientes.historial',["paciente_id"=>$id,"nombre"=>$nombre,"apellidos"=>$apellidos,"alergias"=>$alergias]);

        }

    }

    public function todos(Request $request)
    {

      //$tabla = paciente::all()->paginate(2);
      //$tabla = paciente::with('persona')->get();
      //$tabla = DB::table('pacientes')->paginate(20);
      //$tabla = paciente::all();

      $tabla = DB::table('pacientes')
              ->join('personas','pacientes.persona_id','=','personas.id')
              -> join('pacientes_estados', 'pacientes.estado_id', '=', 'pacientes_estados.id')
              -> select('pacientes.*', 'personas.*','pacientes.id as pac_id' ,'pacientes_estados.nombre as nombre_estado')
              ->orderBy('personas.apellidopaterno', 'asc')
              ->paginate(20);


      if($request->ajax()){


        return response()->json(view('pacientes.todosPartial',['tabla'=>$tabla])->render());
      }


      return view('pacientes.todos',compact('tabla'));

    }

    public function mostrar($id)
    {
      $paciente = paciente::find($id);
      $persona = persona::find($paciente -> persona_id);
      $estado = pacientesEstados::find($paciente->estado_id);
      $departamento = departamento::find($paciente->departamento_id);
      //return $tabla;
      return view('pacientes.mostrar',compact('paciente', 'persona','estado','departamento'));

    }

    public function alergias($id)
    {
      $paciente= paciente::find($id);
      $alergias=$paciente->componentes;
      return view ('pacientes.alergias',["alergias"=>$alergias]);

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
      $post->departamento_id = request('departamento');

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

      return redirect('pacientes');

    }

    public function crearNuevaPersona()
    {

      $estados = pacientesEstados::all();
      $departamentos = departamento::all();
      return response()->json(view('pacientes.crearPersonaPaciente',compact('estados','departamentos'))->render());

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

      $get = paciente::find($id);
      $getPersona = persona::find($get->persona_id);
      $estados = pacientesEstados::all();
      $departamentos = departamento::all();
      $componentes= Componente::all();
      $alergias= $get->componentes->pluck('id')->all();



      return view('pacientes.editar',compact('get','getPersona','estados','departamentos','componentes','alergias'));

    }


    public function guardar()
    {

      $post = persona::find(request('id'));
      $pac = paciente::find(request('paciente_id'));


      $post->apellidopaterno = request('apellidopaterno');
      $post->apellidomaterno = request('apellidomaterno');
      $post->nombres = request('nombres');
      $post->dni = request('dni');
      $post->direccion = request('direccion');
      $post->telefono = request('telefono');
      $post->email = request('email');
      $post->sexo = request('sexo');
      $post->fechanacimiento = request('fechanacimiento');
      $pac->estado_id = request('estado');
      $pac->departamento_id = request('departamento');
      $post->save();
      $pac->save();
      $pac->componentes()->sync(request('componentes'));
      return redirect('pacientes/'.request('paciente_id'));

    }


    public function eliminarConfirm($id){
      $get = paciente::find($id);
      $getPersona = persona::find($get->persona_id);
      $estado = pacientesEstados::find($get->estado_id);
      $departamento = departamento::find($get->departamento_id);
      return view('pacientes.eliminar',compact('get','getPersona','estado','departamento'));
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
      return response()->json(view('pacientes.busquedaDNI', compact('respuesta'))->render());
      //return view('personas.busquedaDNI', compact('respuesta');
    }

    public function llenarPaciente(Request $datos)
    {
      //$respuesta = persona::all();

      $respuesta = persona::find($datos->input('id'));

      $estados = pacientesEstados::all();
      $departamentos = departamento::all();

      return response()->json(view('pacientes.formPaciente', compact('respuesta','estados','departamentos'))->render());
      //return view('personas.busquedaDNI', compact('respuesta');

    }
}
