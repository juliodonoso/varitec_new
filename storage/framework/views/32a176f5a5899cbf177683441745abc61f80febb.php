<?php $__env->startSection('content'); ?>

 <?php $__env->startPush('js'); ?> 
<script>
      $(document).on("click", ".createcat", function() {
        var ruta   = $(this).data('ruta');
        $('.modal-body  #formCeateCat').attr('action',ruta);
      });

      $(document).on("click", ".blockcat", function() {
        var ruta   = $(this).data('ruta');
        var id  = $(this).data('id');
        var nom  = $(this).data('nom');
        $('.modal-body #id').val(id);
        $(".modal-body #nom").text(nom);
        $('.modal-body  #formblockCat').attr('action',ruta);
      });

      $(document).on("click", ".deletecat", function () {
        var ruta   = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").text(name);
        $('.modal-footer #formDeleteCat').attr('action', ruta);
      });

      $(document).on("click", ".editecat", function () {
        var ruta = $(this).data('ruta');
        var name = $(this).data('name');
        var descripcion = $(this).data('descripcion');
        var id = $(this).data('id');
        $(".modal-body #name").val(name);
        $(".modal-body #descripcion").val(descripcion);
        $('.modal-body #id').val(id);
        $('.modal-body #formEditCat').attr('action', ruta);
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
                    <h4 class="title">Categorias</h4>
                    <p class="category">Lista de Categorias</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href=""  data-ruta="<?php echo e(url('Categorias/')); ?>" class="btn btn-primary btn-sm createcat" data-toggle="modal" data-target="#createcat" title="Add">   <i class="fa fa-plus"></i>
                              Registrar
                          </a>
                    </div>

                        <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Num/Id</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $qryCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <td><?php echo e($cat->id); ?></td> 
                                      <td><?php echo e($cat->ctnombre); ?></td>
                                      <td><?php echo e($cat->ctdescripcion); ?></td>
                                      <td>
                                            <span class="
                                             <?php if($cat->ctestado == 1): ?> label label-success
                                             <?php elseif($cat->ctestado == 0): ?> label label-danger
                                             <?php endif; ?> ">
                                            </span> 
                                      </td>

                                      <td>
                                         <a href="" data-id="<?php echo e($cat->id); ?>" data-nom="<?php echo e($cat->ctnombre); ?>" data-ruta="<?php echo e(url('Categorias/block/'.$cat->id)); ?>" class="btn btn-danger btn-xs blockcat" data-toggle="modal" data-target="#blockcat" title="Block">  
                                            <i class="fa fa-lock"></i>
                                         </a> 

                                       <a href="" data-ruta="<?php echo e(url('Categorias/'.$cat->id)); ?>" data-id="<?php echo e($cat->id); ?>" data-name="<?php echo e($cat->ctnombre); ?>" data-descripcion="<?php echo e($cat->ctdescripcion); ?>" data-toggle="modal" data-target="#editecat" class="btn btn-info btn-xs editecat" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                       </a>

                                        <a  href="" data-ruta="<?php echo e(url('Categorias/'.$cat->id)); ?>" data-id="<?php echo e($cat->id); ?>" data-name="<?php echo e($cat->ctnombre); ?>" data-toggle="modal" data-target="#deletecat"  class="btn btn-xs btn-danger deletecat" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                        </a>
                                        
                                      </td>  

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>   
                        </table> 
                       <div class="text-center">
                        <?php echo $qryCat->render(); ?>

                       </div>                         
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('categorias.partial.modaldelete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('categorias.partial.modaladd', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('categorias.partial.modalblock', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('categorias.partial.modaledit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>