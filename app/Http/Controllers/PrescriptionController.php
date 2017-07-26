<?php

namespace App\Http\Controllers;
use Auth;
use DB;
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
    public function imprimir($id)
    {
        $pres=Prescription::find($id);
        return view("Prescriptions.modelo",["pres"=>$pres]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function todos()
    {
      //$pres=Prescription::all();
        $pres= Prescription::where('medico_id', Auth::user()->id)->get();
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
        return redirect('pacientes/historial/'.$pres->paciente_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prescription  $prescription
     * @return \Illuminate\Http\Response
     */
    public function show(Prescription $prescription)
    {
      dd($prescription);
      $pres=collect([]);
        return view('Prescriptions.ver',["prescription"=>$prescription,"medicamentos"=>$pres]);
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

    public function getPres(Request $request)
    {
      $pres=DB::table('prescriptions')->join('pacientes','prescriptions.paciente_id','=','pacientes.id')
      ->join('personas','pacientes.persona_id','=','personas.id')
      ->select('prescriptions.id','prescriptions.medico_id','personas.nombres','prescriptions.observacion')
      ->where([['nombres','like','%'.$request->input('nom').'%'],['medico_id','=',Auth::user()->id]])->get();
      return response()->json(view('Prescriptions.todos',compact('pres'))->render());
    }
}
