<?php

namespace App\Http\Controllers;

use DB;
use App\Componente;
use Illuminate\Http\Request;

class ComponentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Prescriptions.componentes.index');
    }

    public function todos()
    {
        $ac = Componente::all();
        return view('Prescriptions.componentes.todos', ["componentes"=>$ac]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function create()
    {
        return view('Prescriptions.componentes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $c=new Componente;
        $c->nombre=$request->nombre;
        $c->save();
        return redirect('componentes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function show(Componente $componente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function edit(Componente $componente)
    {
        //return $componente;
        return view('Prescriptions.componentes.edit',['componente'=>$componente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Componente $componente)
    {
        //dd($request["nombre"]);
        //dd($componente->nombre);
        $componente->nombre = $request["nombre"];
        $componente->save();
        return redirect('componentes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Componente  $componente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Componente $componente)
    {
        $componente->delete();
        return response()->json(true);
    }

    public function obtenerComponentes(Request $request)
    {
        $componentes = DB::table('componentes')
                -> select('id','nombre')->where([
                    ['nombre','like','%'.$request->input('nom').'%'],
                    ])
                ->get();
        return response()->json(view('Prescriptions.componentes.todos',compact('componentes'))->render());
    }
}
