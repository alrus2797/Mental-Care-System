<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paciente;
use App\Departamento;

class ControlerPaciente extends Controller
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
        $pacientes = Paciente::all();
        return view('paciente.index',['pacientes' => $pacientes]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::all();
        return view('paciente.create',['departamentos' => $departamentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nombre' => 'required|max:255',
            'paterno' => 'required|max:255',
            'materno' => 'max:255',
            'documento' => 'required|max:255|unique:pacientes',
            'departamento_id' => 'required',
            'nacimiento' => 'required',
            'direccion' => 'max:255',
            'telefono' => 'max:255',
            'celular' => 'max:255']);

        $paciente = new paciente;
        $paciente->nombre = $request->nombre;
        $paciente->paterno = $request->paterno;
        $paciente->materno = $request->materno;
        $paciente->documento = $request->documento;
        $paciente->departamento_id = $request->departamento_id;
        $paciente->nacimiento = $request->nacimiento;
        $paciente->direccion = $request->direccion;
        $paciente->telefono = $request->telefono;
        $paciente->celular = $request->celular;
        $paciente->save();
        return redirect()->route('paciente.index')->with('alert-success','Paciente creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        //dd($paciente);
        return view('paciente.historial',compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        $departamentos = Departamento::all();
        return view('paciente.edit',compact('paciente'),['departamentos' => $departamentos]);
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
            'nombre' => 'required|max:255',
            'paterno' => 'required|max:255',
            'materno' => 'max:255',
            'documento' => 'required|max:255|unique:pacientes,documento,'.$id,
            'departamento_id' => 'required',
            'nacimiento' => 'required',
            'direccion' => 'max:255',
            'telefono' => 'max:255',
            'celular' => 'max:255']);

        $paciente = Paciente::findOrFail($id);
        $paciente->nombre = $request->nombre;
        $paciente->paterno = $request->paterno;
        $paciente->materno = $request->materno;
        $paciente->documento = $request->documento;
        $paciente->departamento_id = $request->departamento_id;
        $paciente->nacimiento = $request->nacimiento;
        $paciente->direccion = $request->direccion;
        $paciente->telefono = $request->telefono;
        $paciente->celular = $request->celular;
        $paciente->save();
        return redirect()->route('paciente.index')->with('alert-warning','Paciente editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();
        return redirect()->route('paciente.index')->with('alert-warning','Paciente eliminado');
    }
}
