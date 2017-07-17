<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Enfermedad;
use App\Sintoma;
use App\Especialidad;

class ControlerEnfermedad extends Controller
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
        $enfermedades = Enfermedad::all();
        //$enfermedades = Enfermedad::with('diagnosticosCount')->orderBy('id', 'asc')->get();
        return view('enfermedad.index',['enfermedades' => $enfermedades]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create new data
        $sintomas = Sintoma::all();
        $especialidades = Especialidad::all();
        return view('enfermedad.create',['sintomas' => $sintomas , 'especialidades' => $especialidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation of data
        $this->validate($request,['nombre'=>'required','descripcion'=>'required']);
        //create new data
        $enfermedad = new Enfermedad;
        $enfermedad->nombre = $request->nombre;
        $enfermedad->descripcion = $request->descripcion;
        $enfermedad->especialidad_id = $request->especialidad_id;
        $enfermedad->save();
        if (isset($request->sintomas)) {
            $enfermedad->sintomas()->sync($request->sintomas, false);
        }
        return redirect()->route('enfermedad.index')->with('alert-success','Enfermedad creada');
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
        $sintomas = Sintoma::all();
        $especialidades = Especialidad::all();
        $enfermedad = Enfermedad::findOrFail($id);
        return view('enfermedad.edit', compact('enfermedad'), ['sintomas' => $sintomas , 'especialidades' => $especialidades]);
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
        //aqui
        //validation of data
        $this->validate($request,['nombre'=>'required','descripcion'=>'required']);
        //edit updated data
        $enfermedad = Enfermedad::findOrFail($id);
        $enfermedad->nombre = $request->nombre;
        $enfermedad->descripcion = $request->descripcion;
        $enfermedad->especialidad_id = $request->especialidad_id;
        $enfermedad->save();
        if(isset($request->sintomas)){
            $enfermedad->sintomas()->sync($request->sintomas, true);
        }else{
            $enfermedad->sintomas()->sync(array(), true);
        }
        return redirect()->route('enfermedad.index')->with('alert-warning','Enfermedad editada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enfermedad = Enfermedad::findOrFail($id);
        $enfermedad->sintomas()->sync(array(), true);
        $enfermedad->delete();
        return redirect()->route('enfermedad.index')->with('alert-warning','Enfermedad eliminada');
    }
}