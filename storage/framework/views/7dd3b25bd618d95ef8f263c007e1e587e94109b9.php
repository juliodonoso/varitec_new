
<!DOCTYPE html>
<html lang="es">
<head>
  <title>Recepción Varitec</title>
   <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
  <style>
    @media  print
{
    body {width:1200px;}
    div[class|=col-]{float:left;}
    .col-sm-6{width:50%}
}
  </style>
</head>
<body>
<div class="container">
  <br>
  <!-- head -->
  <div class="row">
    <div class="col col-6 col-xs-6 col-sm-6">
      <div class="">
        <img src="img/logo-varitec.jpg" alt="varitec recepción" ><br>
        <h4><b>VARITEC ELECTRONICA LIMITADA</b></h4><br>
        <span><b>O'HIGGINS 362 - OUILICURA</b></span><br>
        <span><b>FONOS-FAX:  +56-2 2627 1783 +56-2 2627 9581</b></span><br>
        <span><b>CELULAR: 09-817 4697</b></span><br>
        <span>E-mail : luisleiva@varitecelectronica.cl</span><br>

      </div>
    </div>
    <div class="col col-6 col-xs-5 col-sm-6 ">
      <div class="panel panel-default">
        <div class="panel-body">
            <h2>Recepcion #<?php echo e($items->numeroRecepcion); ?></h2>
          </div>
      </div>
    </div>
  </div>
  <!-- head info -->
  <div class="row">
    <div class="col col-6 col-xs-6 col-sm-6">
        <div class="panel panel-default">
            <!-- capsula -->

            <div class="form-group ">
                <label for="nombre">Cliente:</label>
                <span id="nombre"><?php echo e($items->clNombre); ?></span>
            </div>

            <!-- capsula -->

            <div class="form-group ">
                <label for="rut">Rut:</label>
                <span  id="rut"><?php echo e($items->clRut); ?></span>
            </div>

            <!-- capsula -->

            <div class="form-group ">
                <label for="telefonoCliente">Telefono:</label>
                <span id="telefonoCliente"><?php echo e($items->clTelefono); ?></span>
            </div>

            <!-- capsula -->

            <div class="form-group ">
                <label for="contCli">Contacto tecnico:</label>
                <span  id="contCliTec"><?php echo e($items->contactoTecnico); ?></span>
            </div>

            <!-- capsula -->

            <div class="form-group ">
                <label for="contClit">Contacto mail:</label>
                <span  id="contClit"><?php echo e($items->mailContacto); ?></span>
            </div>


        </div>
    </div>

    <div class="col col-6 col-xs-5 ">

        <div class="panel panel-default">
            <!-- capsula -->

              <div class="form-group">
                  <label for="equipo">Equipo:</label>
                  <span ><?php echo e($items->nombreProducto); ?></span>
              </div>

            <!-- capsula -->

              <div class="form-group ">
                  <label for="codEquipo">Código equipo:</label>
                  <span  id="codEquipo"><?php echo e($items->codEquipo); ?></span>
              </div>

            <!-- capsula -->

              <div class="form-group ">
                  <label for="cliente">Fecha recepcion:</label>
                  <span type="cliente" id="cliente"><?php echo e($items->fechaRecepcion); ?></span>
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

          <span><b>Tipo Trabajo:</b><p class="form-control-static">
          <?php if($items->tipoTrabajo ==  0 ): ?>
          Sin selección
          <?php elseif( $items->tipoTrabajo ==  1 ): ?>
          reparación
          <?php elseif( $items->tipoTrabajo ==  2 ): ?>
          Laboratorio
          <?php elseif( $items->tipoTrabajo ==  3 ): ?>
          Post - Venta
          <?php endif; ?>
          </p></span>
          <label>Descripción Visual</label><br>
          <blockquote>
            <?php echo e($items->descripcionVisual); ?>

          </blockquote>
      </div>
    </div>
  </div>
  </div>

</div>

</body>
</html>