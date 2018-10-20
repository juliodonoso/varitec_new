<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Recepcion número {{ $items->numeroRecepcion }}</title>
    <link rel="stylesheet" href="{{ asset('css/pdf.css') }}" media="all" />
  </head>
  <body>
    <main>
      <h1  class="clearfix"><small><span>Fecha Recepción</span><br />{{\Carbon\Carbon::parse($items->fechaRecepcion)->format('d/m/Y') }}</small> Número Recepcion <b>{{ $items->numeroRecepcion }}</b> <small><span>Fecha </span><br /> {{ \Carbon\Carbon::today()->format('d/m/Y') }}</small></h1>
      <table>
        <thead>
          <tr>
            <th class="service">Cliente</th>
            <th class="desc">Equipo</th>
            <th>Codigo</th>
            <th>Contacto</th>
            <th>Tipo trabajo</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="service">{{ $items->clNombre }}</td>
            <td class="desc">{{ $items->idProducto }}</td>
            <td class="unit">{{ $items->clRut }}</td>
            <td class="qty">{{ $items->contactoTecnico }}</td>
            <td class="total">{{ $items->tipoTrabajo }}</td>
          </tr>
         
        </tbody>
      </table>
      
      <div id="notices">
        <div><b>Detalle:</b></div>
        <div class="notice">{{ $items->descripcionVisual }}</div>
      </div>
    </main>
    <footer>
      Invoice was created on a computer and is valid without the signature and seal.
    </footer>
  </body>
</html>