<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Turno;

class ControlerTurno extends Controller
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
        $turnos = Turno::all();
        return view('turnos.index',['turnos' => $turnos]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create new data
        return view('turnos.create');
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
        //validation of data
        $this->validate($request,['turno_name'=>'required']);
        //create new data
        $turno = new Turno;
        $turno->nombre = $request->turno_name;
        $turno->save();
        return redirect()->route('turnos.index')->with('alert-success','Turno creado');
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
        $turno = Turno::findOrFail($id);
        //return to view edit
        return view('turnos.edit',compact('turno'));
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
        $this->validate($request,['turno_name'=>'required']);
        //edit updated data
        $turno = Turno::findOrFail($id);
        $turno->nombre = $request->turno_name;
        $turno->save();
        return redirect()->route('turnos.index')->with('alert-warning','Turno editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $turno = Turno::findOrFail($id);
        $turno->delete();
        return redirect()->route('turnos.index')->with('alert-warning','Turno eliminado');
    }
}