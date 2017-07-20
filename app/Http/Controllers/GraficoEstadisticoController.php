<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GraficoEstadisticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     return "Estosss";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     return view('form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //\GraficoEstadistico\User::create();
        $date_inicio_c=$request->date_inicio;
        $date_final_c=$request->date_final;
       return view('estadistica.medicos',compact('date_inicio_c','date_final_c') );
    }


    public function storec(Request $request)
    {
        //\GraficoEstadistico\User::create();
        $date_inicio_c=$request->date_inicio;
        $date_final_c=$request->date_final;
       return view('estadistica.citas',compact('date_inicio_c','date_final_c') );
    }

    public function storep(Request $request)
    {
        //\GraficoEstadistico\User::create();
        $date_inicio_c=$request->date_inicio;
        $date_final_c=$request->date_final;
       return view('estadistica.paciente',compact('date_inicio_c','date_final_c') );
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //"El medicamento ".$request->date_inicio." y ".$request->date_final;
       // return view('estadistica.citas');
        return "NOSSS";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
