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
      $sqlQuery = "";
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
    public function queryTratamiento()
    {
      $sqlQuery='';
      return view('ManageReporting/repTratamiento',['consulta'=>$sqlQuery]);
    }



}
