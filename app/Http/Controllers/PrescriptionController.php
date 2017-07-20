<?php

namespace App\Http\Controllers;
use Auth;
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
        $prescripciones= Prescription::where('medico_id', Auth::user()->id)->get();
        //return dd($prescripciones);
        return view("Prescriptions.index",["prescripciones"=>$prescripciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function todos()
    {
      $pres=Prescription::all();
      return view('Prescriptions.todos',["prescripciones"=>$pres]);
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
        $pres=new Prescription;
        $pres->observacion=$request->observacion;
        $pres->instrucciones=$request->instruccion;
        $pres->paciente_id=$request->paciente_id;
        $pres->medico_id=$request->medico_id;
        $pres->save();
        $pres->medicina()->attach($request->medicamentos);
        return redirect('pacientes');
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
