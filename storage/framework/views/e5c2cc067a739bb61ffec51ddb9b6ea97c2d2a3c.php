<?php $__env->startSection('content'); ?>

 <?php $__env->startPush('js'); ?> 
<script>
      $(document).on("click", ".createreg", function() {
        var ruta   = $(this).data('ruta');
        $('.modal-body  #formCeateReg').attr('action',ruta);
      });

      $(document).on("click", ".deletereg", function () {
        var ruta   = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").text(name);
        $('.modal-footer #formDeleteReg').attr('action', ruta);
      });

      $(document).on("click", ".editereg", function () {
        var ruta = $(this).data('ruta');
        var name = $(this).data('name');
        var num = $(this).data('num');
        var id = $(this).data('id');
        $(".modal-body #name").val(name);
        $(".modal-body #num").val(num);
        $('.modal-body #id').val(id);
        $('.modal-body #formEditReg').attr('action', ruta);
      });

</script>
<?php $__env->stopPush(); ?>

<div class="content" >
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
      <?php echo $__env->make('include.mensajes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Regiones</h4>
                    <p class="category">Lista de Regiones</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href=""  data-ruta="" class="btn btn-primary btn-sm createreg" data-toggle="modal" data-target="#createreg" title="Add">   <i class="fa fa-plus"></i>
                              Registrar
                          </a>
                    </div>

                        <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Num/Id</th>
                                    <th>Nombre</th>
                                    <th>Num Ordinal</th>
                                    <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $qryReg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <td><?php echo e($reg->id); ?></td> 
                                      <td><?php echo e($reg->rgnombre); ?></td>  
                                      <td><?php echo e($reg->rgordinal); ?></td>  
                                      <td>

                                       <a href="" data-ruta="<?php echo e(url('Regiones/'.$reg->id)); ?>" data-id="<?php echo e($reg->id); ?>" data-name="<?php echo e($reg->rgnombre); ?>" data-num="<?php echo e($reg->rgordinal); ?>" data-toggle="modal" data-target="#editereg" class="btn btn-info btn-xs editereg" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                       </a>

                                        <a  href="" data-ruta="<?php echo e(url('Regiones/'.$reg->id)); ?>" data-id="<?php echo e($reg->id); ?>" data-name="<?php echo e($reg->rgnombre); ?>" data-toggle="modal" data-target="#deletereg"  class="btn btn-xs btn-danger deletereg" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                        </a>
                                        
                                      </td>  

                                    </tr>
                                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>   
                        </table> 
                       <div class="text-center">
                        <?php echo $qryReg->render(); ?>

                       </div>                          
                    </div>                    
                </div>
            </div>
        </div>
    </div>

 <?php echo $__env->make('regiones.partial.modaldelete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>   
 <?php echo $__env->make('regiones.partial.modaladd', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <?php echo $__env->make('regiones.partial.modaledit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>