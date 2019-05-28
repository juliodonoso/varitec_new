
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Recepción Vatitec</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container-fluid">
  <br>
  <!-- head -->
  <div class="row">
    <div class="col-6 col-xs-6">
      <div class="form-group">
        <img src="img/logo-varitec.jpg" alt="varitec recepción" ><br>
        <h4><b>VARITEC ELECTRONICA LIMITADA</b></h4><br>
        <span><b>O'HIGGINS 362 - OUILICURA</b></span><br>
        <span><b>FONOS-FAX:  +56-2 2627 1783 +56-2 2627 9581</b></span><br>
        <span><b>CELULAR: 09-817 4697</b></span><br>
        <span>E-mail : luisleiva@varitecelectronica.cl</span><br>

      </div>
    </div>
    <div class="col-6 col-xs-6 pull-right">
      <div class="panel panel-default">
        <div class="panel-body">
            <h2>Recepcion #{{ $items->numeroRecepcion }}</h2>
          </div>
      </div>
    </div>
  </div>
  <!-- head info -->
  <div class="row">
    <div class="col col-6 col-xs-6">
        <div class="panel panel-default">
            <!-- capsula -->

            <div class="form-group ">
                <label for="nombre">Cliente:</label>
                <span type="nombre" id="nombre">{{ $items->clNombre }}</span>
            </div>

            <!-- capsula -->

            <div class="form-group ">
                <label for="rut">Rut:</label>
                <span type="rut" id="rut">{{ $items->clRut }}</span>
            </div>

            <!-- capsula -->

            <div class="form-group ">
                <label for="telefonoCliente">Telefono:</label>
                <span type="telefonoCliente" id="telefonoCliente">juan perez</span>
            </div>

            <!-- capsula -->

            <div class="form-group ">
                <label for="contCli">Contacto tecnico:</label>
                <span type="contCli" id="contCli">{{ $items->contactoTecnico }}</span>
            </div>

            <!-- capsula -->

            <div class="form-group ">
                <label for="contClit">Contacto mail:</label>
                <span type="contClit" id="contClit">{{ $items->mailContacto }}</span>
            </div>


        </div>
    </div>

    <div class="col col-6 col-xs-6">

        <div class="panel panel-default">
            <!-- capsula -->

              <div class="form-group">
                  <label for="equipo">Equipo:</label>
                  <span >{{ $items->nombreProducto }}</span>
              </div>

            <!-- capsula -->

              <div class="form-group ">
                  <label for="codEquipo">Código equipo:</label>
                  <span  id="codEquipo">{{ $items->codEquipo }}</span>
              </div>

            <!-- capsula -->

              <div class="form-group ">
                  <label for="cliente">Fecha recepcion:</label>
                  <span type="cliente" id="cliente">{{ $items->fechaRecepcion }}</span>
              </div>

             <!-- capsula -->

              <div class="form-group ">
                  <label for="cliente"></label>
                  <span type="cliente" id="cliente"> </span>
              </div>

            <!-- capsula -->

              <div class="form-group">
                  <label for="cliente"> </label>
                  <span type="cliente" id="cliente"> </span>
              </div>


        </div>
    </div>

  </div>

  <!--  pie-->
  <div class="row">
    <div class="panel panel-default">
    <div class="col-12 col-xs-12">
      <div class="form-group">

          <span><b>Tipo Trabajo:</b><p class="form-control-static"> {{ $items->tipoTrabajo }}</p></span>
          <label>Descripción Visual</label><br>
          <blockquote>
            {{ $items->descripcionVisual }}
          </blockquote>
      </div>
    </div>
  </div>
  </div>

</div>

</body>
</html>