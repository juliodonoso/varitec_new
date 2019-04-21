<?php $__env->startSection('content'); ?>

<?php $__env->startPush('js'); ?>
<script type="text/javascript">
  $( document ).ready(function() {

  $("#agregar").click(function(){ 

    var html = $(".clone").html();
    $(".increment").after(html);
    });


    
  })
  </script>
<?php $__env->stopPush(); ?>

<div class="content" >
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
     
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="red">
                    <h4 class="title">Suministros</h4>
                    <p class="category">Agregar nuevo suministro a bodega</p>
                </div>

                <div class="card-content">
                    <div class="content">

                      <?php echo e(Form::open(array('url' => './suministros'),['method'=>'POST'])); ?>

                     
                        <div class="row">
                          <div class="col-md-9">  
                            <div class="form-group">
                              <label for="prNombre" >Nombre</label>
                              <?php echo e(Form::text('prNombre','',['class'=>'form-control','required'])); ?>

                            </div>

                          </div>

                          <div class="col-md-3">
                              <div class="form-group">
                                <label for="cantidadInicial">Cantidad Inicial</label>
                                <?php echo e(Form::text('cantidadInicial','',['class'=>'form-control','required'])); ?>

                              </div>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="col-md-3">
                              <label for="prBarcode">Codigo de barra</label>
                              <?php echo e(Form::text('prBarcode','',['class'=>'form-control','required'])); ?>

                            </div>
                            <div class="col-md-3">
                                <label for="prValorizado">Suministro valorizado</label>
                                <?php echo e(Form::number('prValorizado','',['class'=>'form-control','required'])); ?>

                            </div>
                            <div class="col-md-3">
                              <label> Cantidad Critica</label>
                              <?php echo e(Form::number('prCritico','',['class'=>'form-control','required'])); ?>

                            </div>
                            <div class="col-md-3">
                              <label>Cod. Interno</label>
                              <?php echo e(Form::number('prInterno','',['class'=>'form-control','required'])); ?>

                            </div>
                          </div>

                        </div>
                    
                      <div class="row">
                          <div class="col-md-12">
                            <div class="col-md-6">
                              <?php echo e(Form::submit('Agregar',['class'=>'btn btn-success'])); ?>

                            </div>
                            <div class="col-md-6">
                              <?php echo e(Form::button('Volver',['class'=>'btn btn-danger','onclick'=>' window.history.back();'])); ?>

                            </div>
                          </div>
                      </div>

                      <?php echo e(Form::close()); ?>

                    </div>
                                       
                </div>
            </div>
        </div>
    </div>


  </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>