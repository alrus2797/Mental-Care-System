<?php

namespace App\Http\Controllers;

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
        $especialidades = Especialidad::all();
        $departamentos = Departamento::all();
        $turnos = Turno::all();
        $especialidades = Especialidad::all();
        return view('usuarios.create',['departamentos' => $departamentos , 'turnos' => $turnos , 'especialidades' => $especialidades]);
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
            'name' => 'required|max:255',
            'documento' => 'required|max:255|unique:users',
            'departamento_id' => 'required',
            'tipo_usuario' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed']);

        $user = new user;
        $user->name = $request->name;
        $user->documento = $request->documento;
        $user->departamento_id = $request->departamento_id;
        $user->tipo_usuario = $request->tipo_usuario;
        $user->email = $request->email;
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
            'name' => 'required|max:255',
            'carnet' => 'required|max:255|unique:users,carnet,'.$id,
            'departamento_id' => 'required',
            'tipo_usuario' => 'required',
            'email' => 'required|email|max:255|unique:users,email,'.$id]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->carnet = $request->carnet;
        $user->departamento_id = $request->departamento_id;
        $user->tipo_usuario = $request->tipo_usuario;
        $user->email = $request->email;
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