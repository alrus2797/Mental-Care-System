<?php

namespace App\Http\Controllers;

use App\Persona;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Departamento;
use App\Turno;
use App\Especialidad;
use DB;
//use App\Quotation;

class ControlerUser extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('usuarios.index',['users' => $users]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas = Persona::all();
        $departamentos = Departamento::all();
        $turnos = Turno::all();
        $especialidades = Especialidad::all();
        return view('usuarios.create',['departamentos' => $departamentos , 'turnos' => $turnos , 'especialidades' => $especialidades,'personas' => $personas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $this->validate($request,[
            'departamento_id' => 'required',
            'tipo_usuario' => 'required',
            'persona_id' => 'required',
           ]);

        $user = new user;
        $user->departamento_id = $request->departamento_id;
        $user->tipo_usuario = $request->tipo_usuario;
        $user->persona_id= $request->persona_id;
        $persona=Persona::findOrFail($request->persona_id);
        $user->email = $persona->email;
        $user->documento= $persona->dni;
        $user->name=$persona->nombres;
        $user->password = bcrypt($persona->dni);
        if ($request->tipo_usuario == 'Administrador') {
            $user->especialidad_id = null;
            $user->turno_id = null;
        }else{
            if(isset($request->especialidad_id)){
                $user->especialidad_id = $request->especialidad_id;
            }
            if(isset($request->turno_id)){
                $user->turno_id = $request->turno_id;
            }            
        }
        $user->save();
        return redirect()->route('usuarios.index')->with('alert-success','Usuario creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$user = User::findOrFail($id);
        $departamentos = Departamento::all();
        $turnos = Turno::all();
        $especialidades = Especialidad::all();
        return view('usuarios.edit',['user' => $user , 'departamentos' => $departamentos , 'turnos' => $turnos , 'especialidades' => $especialidades]);
    }


    public function updatepassview($id)
    {
        $user = User::findOrFail($id);
        $departamentos = Departamento::all();
        $turnos = Turno::all();
        $especialidades = Especialidad::all();
        return view('usuarios.password',['user' => $user , 'departamentos' => $departamentos , 'turnos' => $turnos , 'especialidades' => $especialidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $this->validate($request,[
            'departamento_id' => 'required',
            'tipo_usuario' => 'required',
            ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $persona=$user->persona();
        $user->name = $persona->name;
        $user->email = $persona->email;
        $user->documento= $persona->dni;
        $user->name=$persona->nombres;
        $user->departamento_id = $request->departamento_id;
        $user->persona_id = $persona->id;
        $user->tipo_usuario = $request->tipo_usuario;
        $user->email = $persona->email;
        $user->password = bcrypt($request->password);
        if ($request->tipo_usuario == 'Administrador') {
            $user->especialidad_id = null;
            $user->turno_id = null;
        }else{
            if(isset($request->especialidad_id)){
                $user->especialidad_id = $request->especialidad_id;
            }
            if(isset($request->turno_id)){
                $user->turno_id = $request->turno_id;
            }            
        }
        $user->save();
        return redirect()->route('usuarios.index')->with('alert-warning','Usuario editado');
    }

    public function updatepass(Request $request, $id)
    {
        //dd($request);
        $this->validate($request,['password' => 'required|min:6|confirmed']);

        $user = User::findOrFail($id);
        $user->password = bcrypt($request->password);
        $user->save();
        return redirect()->route('usuarios.index')->with('alert-success','Contraseña actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('usuarios.index')->with('alert-warning','Usuario eliminado');
    }
}