<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Departamento;

class ControladorDepartamento extends Controller
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
        $departamentos = Departamento::all();
        return view('departamento.index',['departamentos' => $departamentos]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //create new data
        return view('departamento.create');
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
        $this->validate($request,['departamento_name'=>'required','abreviatura'=>'required']);
        //create new data
        $departamento = new departamento;
        $departamento->name = $request->departamento_name;
        $departamento->abreviatura = $request->abreviatura;        
        $departamento->save();
        return redirect()->route('departamento.index')->with('alert-success','Departamento creado');
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
        $departamento = Departamento::findOrFail($id);
        //return to view edit
        return view('departamento.edit',compact('departamento'));
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
        $this->validate($request,['departamento_name'=>'required','abreviatura'=>'required']);
        //edit updated data
        $departamento = Departamento::findOrFail($id);
        $departamento->name = $request->departamento_name;
        $departamento->abreviatura = $request->abreviatura;
        $departamento->save();
        return redirect()->route('departamento.index')->with('alert-warning','Departamento editado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departamento = Departamento::findOrFail($id);
        $departamento->delete();
        return redirect()->route('departamento.index')->with('alert-warning','Departamento eliminado');
    }
}
