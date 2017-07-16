<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Diagnostico;
use App\Paciente;
use App\Enfermedad;
use App\Sintoma;
use Auth;

class ControlerDiagnostico extends Controller
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
        $user = Auth::user();
        $diagnosticos = Diagnostico::where('user_id', '=', $user->id)
                                    ->where('estado', '=', 'Terminado')
                                    ->get();
        return view('diagnostico.index',['diagnosticos' => $diagnosticos]);
    }

    public function pendientes()
    {
        $user = Auth::user();
        $diagnosticos = Diagnostico::where('user_id', '=', $user->id)
                                    ->where('estado', '=', 'Pendiente')
                                    ->get();
        return view('diagnostico.pendientes',['diagnosticos' => $diagnosticos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create new data
        $pacientes = Paciente::all();
        $sintomas = Sintoma::all();
        $enfermedades = Enfermedad::all();
        return view('diagnostico.create',['pacientes' => $pacientes , 'enfermedades' => $enfermedades , 'sintomas' => $sintomas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['paciente_id'=>'required','recomendacion'=>'required','receta'=>'required']);
        $user = Auth::user();
        $diagnostico = new Diagnostico;
        $diagnostico->user_id = $user->id;
        $diagnostico->paciente_id = $request->paciente_id;
        $diagnostico->recomendacion = $request->recomendacion;
        $diagnostico->receta = implode(",",$request->receta);

        if (isset($request->retorno)) {
        	$diagnostico->retorno = $request->retorno;
        }
        if (isset($request->estado)) {
            $diagnostico->estado = "Terminado";
        }else{
            $diagnostico->estado = "Pendiente";
        }
        $diagnostico->save();
        if (isset($request->sintomas)) {
            $diagnostico->sintomas()->sync($request->sintomas, false);
        }
        if (isset($request->enfermedades)) {
            $diagnostico->enfermedades()->sync($request->enfermedades, false);
        }
        return redirect()->route('diagnostico.index')->with('alert-success','Diagnostico creado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diagnostico = Diagnostico::findOrFail($id);
        return view('diagnostico.show',compact('diagnostico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $diagnostico = Diagnostico::findOrFail($id);
        $pacientes = Paciente::all();
        $sintomas = Sintoma::all();
        $enfermedades = Enfermedad::all();
        return view('diagnostico.edit',compact('diagnostico'),['pacientes' => $pacientes , 'enfermedades' => $enfermedades , 'sintomas' => $sintomas]);
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
        //validation of data
        $this->validate($request,['paciente_id'=>'required','recomendacion'=>'required','receta'=>'required']);

        $user = Auth::user();

        $diagnostico = Diagnostico::findOrFail($id);
        $diagnostico->user_id = $user->id;
        $diagnostico->paciente_id = $request->paciente_id;
        $diagnostico->recomendacion = $request->recomendacion;
        $diagnostico->receta = $request->receta;
        if (isset($request->retorno)) {
        	$diagnostico->retorno = $request->retorno;
        }
        $diagnostico->estado = "Terminado";
        $diagnostico->save();

        if (isset($request->sintomas)) {
            $diagnostico->sintomas()->sync($request->sintomas, true);
        }else{
            $diagnostico->sintomas()->sync(array(), true);
        }

        if (isset($request->enfermedades)) {
            $diagnostico->enfermedades()->sync($request->enfermedades, true);
        }else{
            $diagnostico->enfermedades()->sync(array(), true);
        }

        return redirect()->route('diagnostico.index')->with('alert-warning','Diagnostico editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $diagnostico = Diagnostico::findOrFail($id);
        $diagnostico->enfermedades()->sync(array(), true);
        $diagnostico->sintomas()->sync(array(), true);
        $diagnostico->delete();
        return redirect()->route('diagnostico.index')->with('alert-warning','Diagnostico eliminado');
    }
}