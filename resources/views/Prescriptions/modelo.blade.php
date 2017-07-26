<!DOCTYPE html>
<!---<html>
  <head>
    <meta charset="utf-8">
    <title>Imprimir</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{asset( 'js/bootstrap.min.js')}}"></script>
    <style type="text/css" media="print">
    @media print{
        @page {
            size: a5;
            margin: 0;
        }
    }
</style>
  </head>
  <body>
    <table class="table">
      <thead>
        <tr>
          <th class="col-md-1"></th>
          <th style="vertical-align:middle;" class="col-md-10">
              Mental Care System
          </th>
          <th>
              <table class="table">
                <tr>
                  <th>Telefono</th>
                  <th>451166</th>
                </tr>
                <tr>
                  <th>Correo</th>
                  <th>mentalcare@system.com</th>
                </tr>
                <tr>
                  <th>Dirección</th>
                  <th>Av. Los polaños N° 103</th>
                </tr>
              </table>
          </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th></th>
          <td>Observacion</td>
          <td>askdjaskldklasdklsajdlksajd</td>
        </tr>
        <tr>
          <td></td>
          <td>Observacion</td>
          <td>{{ "asdsadsad asdsadsadasdsasdjmslkdjlsadkls"}}</td>
        </tr>
        <tr>
          <td></td>
          <td>Observacion</td>
          <td>askdjaskldklasdklsajdlksajd</td>
        </tr>
      </tbody>
    </table>

  </body>
</html>-->
<meta charset="utf-8">
<style media="screen">
@page {
  /* dimensions for the whole page */
  size: A5;

  margin: 0;
}

html {
  /* off-white, so body edge is visible in browser */
  background: #eee;
}

body {
  /* A5 dimensions */
  height: 210mm;
  width: 148.5mm;

  margin: 0;
}

/* fill half the height with each face */
.face {
  height: 50%;
  width: 100%;
  position: relative;
}

/* the back face */
.face-back {
}

/* the front face */
.face-front {
  background: #fff;
}

/* an image that fills the whole of the front face */
.face-front img {
  position: absolute;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  width: 100%;
  height: 100%;
}
td{
    font-weight: normal;
}
</style>
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="{{asset( 'js/bootstrap.min.js')}}"></script>

<body>
  <div class="col-md-3"></div>
  <div class="col-md-6">
     <h3>Receta Médica</h3>
  </div>
  <div class="col-md-3"></div>
    <div class="face face-back">
      <div class="col-md-4"></div>

      <table class="table table-striped">
        <thead>
          <tr>
            <th class="col-md-1"></th>
            <th style="vertical-align:middle;" class="col-md-5">
                Mental Care System
            </th>
            <th>
                <table class="table table-md ">

                  <tr>
                    <th>Paciente: </th>
                    <td>{{$pres->paciente->persona->nombre_completo()}}</td>
                  </tr>
                  <tr>
                    <th>Teléfono: </th>
                    <td>{{$pres->paciente->persona->telefono}}</td>
                  </tr>
                  <tr>
                    <th>Dirección: </th>
                    <td>{{$pres->paciente->persona->direccion}}</td>
                  </tr>
                </table>
            </th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th></th>
            <th>Médico: </th>
            <td>{{$pres->medico->persona()->nombre_completo()}}</td>
          </tr>
          <tr>
            <td></td>
            <th>Instrucciones: </th>
            <td>{{$pres->instrucciones}}</td>
          </tr>
          <tr>
            <td></td>
            <th>Observacion: </th>
            <td>{{$pres->observacion}}</td>
          </tr>
        </tbody>
      </table>
      <div class="col-md-1">
      </div>
      <div class="col-md-5">
        <b>Medicamentos: </b>
      </div>
      <div class="col-md-6">
        <table class="table table-striped" >
          <tbody>
            @foreach($pres->medicina as $m)
            <tr>
              <td>{{$m->medicamento->nombre}}</td>
            </tr>
            @endforeach
          </tbody>

        </table>
      </div>

    </div>

</body>
