<?php

namespace App\Http\Controllers;

use App\Prescription;
use App\Medicamento;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("Prescriptions.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function todos()
    {
      //$pres=Prescription::all();
      //return view('Prescriptions.todos');
    }

    public function create()
    {
      $medicamentos=Medicamento::all();
      return view('Prescriptions.crear',["medicamentos"=>$medicamentos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $pres=new App\Prescription;
        $pres->observacion=$request->observacion;
        $pres->instruccion=$request->instruccion;
        $pres->paciente_id=$request->paciente_id;
        $pres->medico_id=$request->medico_id;
        $pres->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function edit(Prescription $prescription)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prescription $prescription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        //
    }
}
