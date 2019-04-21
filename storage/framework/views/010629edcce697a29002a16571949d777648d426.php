<?php $__env->startSection('content'); ?>

 <?php $__env->startPush('js'); ?> 
<script>
      $(document).on("click", ".createprov", function() {
        var ruta   = $(this).data('ruta');
        $('.modal-body  #formCeateProv').attr('action',ruta);
      });

      $(document).on("click", ".deleteprov", function () {
        var ruta   = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").text(name);
        $('.modal-footer #formDeleteProv').attr('action', ruta);
      });

      $(document).on("click", ".editeprov", function () {
        var ruta = $(this).data('ruta');
        var name = $(this).data('name');
        var num = $(this).data('num');
        var id = $(this).data('id');
        $(".modal-body #name").val(name);
        $(".modal-body #num").val(num);
        $('.modal-body #id').val(id);
        $('.modal-body #formEditProv').attr('action', ruta);
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
                    <h4 class="title">Provincias</h4>
                    <p class="category">Lista de Provincias</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href=""  data-ruta="" class="btn btn-primary btn-sm createprov" data-toggle="modal" data-target="#createprov" title="Add"> <i class="fa fa-plus"></i>
                              Registrar
                         </a>
                    </div>

                        <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Num/Id</th>
                                    <th>Nombre</th>
                                    <th>Num-Region</th>
                                    <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $qryProv; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prov): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <td><?php echo e($prov->id); ?></td> 
                                      <td><?php echo e($prov->ponombre); ?></td>
                                      <td><?php echo e($prov->poregion); ?></td>
                                      <td>
                                       <a href="" data-ruta="<?php echo e(url('Provincias/'.$prov->id)); ?>" data-id="<?php echo e($prov->id); ?>" data-name="<?php echo e($prov->ponombre); ?>" data-num="<?php echo e($prov->poregion); ?>" data-toggle="modal" data-target="#editeprov" class="btn btn-info btn-xs editeprov" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                       </a>

                                        <a  href="" data-ruta="<?php echo e(url('Provincias/'.$prov->id)); ?>" data-id="<?php echo e($prov->id); ?>" data-name="<?php echo e($prov->ponombre); ?>" data-toggle="modal" data-target="#deleteprov"  class="btn btn-xs btn-danger deleteprov" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                        </a>
                                        
                                      </td>  

                                    </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>   
                        </table>   
                       <div class="text-center">
                        <?php echo $qryProv->render(); ?>

                       </div>                              
                    </div>                    
                </div>
            </div>
        </div>
    </div>

     <?php echo $__env->make('provincias.partial.modaladd', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->make('provincias.partial.modaldelete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->make('provincias.partial.modaledit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>