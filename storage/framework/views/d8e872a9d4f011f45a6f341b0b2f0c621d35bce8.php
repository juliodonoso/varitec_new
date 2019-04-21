<?php $__env->startSection('content'); ?>

<?php $__env->startPush('js'); ?>
<script type="text/javascript">
  $( document ).ready(function() {
    
  $("#agregar").click(function(){ 

    var html = $(".clone").html();
    $(".increment").after(html);
    });


  $("body").on("click",".btn-danger",function(){ 
  $(this).parents(".control-group").remove();
    });

  })
  </script>
<?php $__env->stopPush(); ?>

<div class="content" >
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
     
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Cotizar Suministros</h4>
                    <p class="category">Solicitar</p>
                </div>

                <div class="card-content">
                    <div class="content">

                      <?php echo e(Form::open( array('action' => 'SuministrosController@store'))); ?>

                        
                        <div class="col-md-6">  
                          <div class="form-group">
                            <label for="numeroRecepcion" >Número  Solicitud</label>
                            <label> <h3><?php echo e($cotizacion); ?></h3> </label>
                          </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                              <label for="fechaRecepcion">Fecha Solicitud</label>
                              <input type="date" readonly class="form-control" id="fechaRecepcion" name="fechaRecepcion" value="<?php echo e(date('Y-m-d')); ?>">
                            </div>
                        </div>

                         <div class="col-md-6">  
                          <div class="form-group">
                            <label for="cliente">Solitante</label>
                              <h3><?php echo e($solicitante); ?></h3>
                          </div>
                        </div>
                        </div>
                    <hr>  
                    <div class="col-md-12">
                        <div class="input-group hdtuto control-group lst increment" >
                          <div class="col-md-10">
                            <select  name="inputname[]" class="myfrm form-control" required>
                                <option value="" >Seleccione Suministro</option>
                                  <?php $__currentLoopData = $suministros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($sum->id); ?>"><?php echo e($sum->prNombre); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
                            
                          </div>
                          <div class="col-md-2"><input type="number" name="inputcantidad[]" class="myfrm form-control" required></div>
                            <div class="input-group-btn"> 
                    
                            <button class="btn btn-success" id="agregar" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Agregar</button>
                    
                            </div>
                          </div>
  
                          <div class="clone hide">                  
                          <div class="hdtuto control-group lst input-group" style="margin-top:10px ">
                    
                             <div class="col-md-10">
                              <select  name="inputname[]" class="myfrm form-control" >
                                  <option value="" >Seleccione Suministro</option>
                                  <?php $__currentLoopData = $suministros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                  <option value="<?php echo e($sum->id); ?>"><?php echo e($sum->prNombre); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </select>
  
                             </div>
                            <div class="col-md-2"><input  type="number" name="inputcantidad[]" class="myfrm form-control"></div>
                            <div class="input-group-btn"> 
                    
                              <button class="btn btn-danger" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remover</button>
                    
                            </div>
                    
                          </div>
                    
                        </div> 
                          <div class="col-md-12">
                            <span> <br><br><br><br></span>
                          </div>
                          
                        </div>

                        
                        <div class="col-md-12">
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">Enviar</button>
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