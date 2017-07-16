<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class descargasRepController extends Controller
{
  public function runQuery($sqlQuery)
  {
    return DB::select(DB::raw($sqlQuery));
  }


  public function queryArchivosRep()
  {
    $sqlQuery = "select * from reportes ;";
    $results = $this->runQuery($sqlQuery);
    return view('ManageReporting/descargarRep',compact('results'));
  }



}
