<?php $__env->startSection('content'); ?>

 <?php $__env->startPush('js'); ?> 
<script>
      $(document).on("click", ".createBod", function() {
        var ruta   = $(this).data('ruta');
        $('.modal-body  #formCeateBod').attr('action',ruta);
      });

      $(document).on("click", ".deletebod", function () {
        var ruta   = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").text(name);
        $('.modal-footer #formDeletebod').attr('action', ruta);
      });

      $(document).on("click", ".editeBod", function () {
        var ruta = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").val(name);
        $('.modal-body #id').val(id);
        $('.modal-body #formEditbod').attr('action', ruta);
      });

</script>
<?php $__env->stopPush(); ?>

<div class="content" >
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
      <?php echo $__env->make('include.mensajes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">Bodegas</h4>
                    <p class="category">Lista de Bodegas</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href=""  data-ruta="<?php echo e(url('Bodegas/')); ?>" class="btn btn-primary btn-sm createBod" data-toggle="modal" data-target="#createBod" title="Add">   <i class="fa fa-plus"></i>
                              Registrar
                          </a>
                    </div>

                        <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Num/Id</th>
                                    <th>Nombre</th>
                                    <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $qryBod; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <td><?php echo e($bod->id); ?></td> 
                                      <td><?php echo e($bod->bgNombre); ?></td>  

                                      <td>
                                       <a href="" data-ruta="<?php echo e(url('Bodegas/'.$bod->id)); ?>" data-id="<?php echo e($bod->id); ?>" data-name="<?php echo e($bod->bgNombre); ?>" data-toggle="modal" data-target="#editeBod" class="btn btn-info btn-xs editeBod" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                       </a>

                                        <a  href="" data-ruta="<?php echo e(url('Bodegas/'.$bod->id)); ?>" data-id="<?php echo e($bod->id); ?>" data-name="<?php echo e($bod->bgNombre); ?>" data-toggle="modal" data-target="#deletebod"  class="btn btn-xs btn-danger deletebod" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                        </a>
                                        
                                      </td>  

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>   
                        </table> 
                       <div class="text-center">
                        <?php echo $qryBod->render(); ?>

                       </div>       
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('bodegas.partial.modaldelete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('bodegas.partial.modaladd', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('bodegas.partial.modaledit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


  </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>