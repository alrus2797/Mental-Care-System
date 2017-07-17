<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
require 'libs/dompdf/autoload.inc.php';
use Dompdf\Dompdf;


class descargasRepController extends Controller
{

  public function runQuery($sqlQuery)
  {
    return DB::select(DB::raw($sqlQuery));
  }

  public function generarPDF()
  {

    $filename="prueba";
    $fecha_reporte ="2017-07-15";
    $tipo = "infopac";
    $fechacreado="2017-07-17";


    $sqlQuery = "INSERT INTO `reporte` (`id`, `nombre`, `fecha`, `tipo`, `created_at`, `updated_at`)
                  VALUES (NULL, '$filename', '$fecha_reporte', '$tipo', '$fechacreado', NULL);";
    $results = $this->runQuery($sqlQuery);


    

    $content="<h1>Hello</h1>";
    $dompdf = new Dompdf();
    $dompdf->loadHtml($content);
    $dompdf->setPaper('A4', 'landscape');
    $dompdf->render();
    $pdf = $dompdf->output();
    file_put_contents('reportesPDF/'.$filename.'.pdf', $pdf);




    //header('Content-Disposition: inline; filename="/reportesPDF'.$filename.'.pdf"');
    //readfile('nombre_original_del_archivo.pdf');
    //$dompdf->stream("Información.pdf");
    //file_put_contents("archivo.pdf", $pdf);
    $ruta="reportesPDF/".$filename.".pdf";
    return view('ManageReporting/infoTratamiento',['ruta'=>$ruta]);
  }



}
