<?php

namespace App\Http\Controllers;

use App\Medicina;
use App\Presentacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MedicinasController extends Controller
{

    public function index()
    {
        //
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Medicina $medicina)
    {
   //     dd($medicina);
        return view('Prescriptions.medicamentos.ver',["medicina"=> $medicina]);
    }
    public function edit(Medicina $medicina)
    {
        $presentaciones = Presentacion::all();
       return view('Prescriptions.medicamentos.editar',["medicina"=> $medicina, "presentaciones"=>$presentaciones]);
    }
    public function update(Request $request, Medicina $medicina)
    {
        //dd($medicina);
        //dd($request);
//        $medicina = Medicina::find($medicina->id);
  //      $medicina->cantidad = $medicina
        DB::table('medicinas')
            ->where('id', $medicina->id)
            ->update(['cantidad' => $request['cantidad']]);

        DB::table('medicamentos')
            ->where('id',$medicina->medicamento_id)
            ->update([ 'nombre' => $request['nombre'], 'descripcion'=>$request['descripcion'],'adversos'=>$request['adversos'], 'efecSecundarios'=>$request['efectos']]);
            return redirect("medicamentos");
    }
    /*,
                'efecSecundarios' => $request['efectos'],
                'descripcion'=> $request['descripcion'],
                'adversos'= $request['adversos']
 */
    public function destroy(Medicina $medicina)
    {
        //
    }
}
