<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Especialidad;

class ControlerEspecialidad extends Controller
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
        $especialidades = Especialidad::all();
        return view('especialidad.index',['especialidades' => $especialidades]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create new data
        return view('especialidad.create');
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
        $especialidad = new Especialidad;
        $especialidad->nombre = $request->nombre;
        $especialidad->descripcion = $request->descripcion;        
        $especialidad->save();
        return redirect()->route('especialidad.index')->with('alert-success','Especialidad creada');
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
        $especialidad = Especialidad::findOrFail($id);
        //return to view edit
        return view('especialidad.edit',compact('especialidad'));
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
        $this->validate($request,['nombre'=>'required','descripcion'=>'required']);
        //edit updated data
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->nombre = $request->nombre;
        $especialidad->descripcion = $request->descripcion;
        $especialidad->save();
        return redirect()->route('especialidad.index')->with('alert-warning','Especialidad editada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->delete();
        return redirect()->route('especialidad.index')->with('alert-warning','Especialidad eliminada');
    }
}