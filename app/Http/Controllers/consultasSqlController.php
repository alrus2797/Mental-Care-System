<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class consultasSqlController extends Controller
{
    public function index()
    {
      return "Hola index";
    }

    public function runQuery($sqlQuery)
    {
      return DB::select(DB::raw($sqlQuery));
    }


    public function queryAtencion()
    {
      $sqlQuery = " ";
      $results = $this->runQuery($sqlQuery);

      return view('ManageReporting/repAtencion',compact('results'));
    }
    public function queryAtendidos()
    {
      $sqlQuery='';
      return view('ManageReporting/repAtendidos',['consulta'=>$sqlQuery]);
    }
    public function queryFarmacos()
    {
      $sqlQuery='';
      return view('ManageReporting/repFarmacos',['consulta'=>$sqlQuery]);
    }
    public function queryMedRecetados()
    {
      $sqlQuery='';
      return view('ManageReporting/repMedRecetados',['consulta'=>$sqlQuery]);
    }


    public function queryTratamiento(Request $request)
    {

      if($request->nombre != "" || $request->dni!= "")
      {
        $sqlQuery="select personas.nombres          as nombre,
                          personas.apellidopaterno  as ap_paterno,
                          personas.apellidomaterno  as ap_materno,
                          personas.created_at       as fecha_admision
                          from personas inner join pacientes
                          on personas.id=pacientes.persona_id where personas.nombres like '%".$request->nombre."%';";
        $results = $this->runQuery($sqlQuery);
        return view('ManageReporting/repTratamiento',compact('results'));
      }
      else
      {
        $results=NULL;
        return view('ManageReporting/repTratamiento',compact('results') );
      }
    }
}
