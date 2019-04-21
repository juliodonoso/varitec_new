<?php $__env->startSection('content'); ?>

 <?php $__env->startPush('js'); ?> 
<script>
      $(document).on("click", ".createUser", function() {
        var ruta   = $(this).data('ruta');
        $('.modal-body  #formCreateuser').attr('action',ruta);
      });

      $(document).on("click", ".resetPass", function() {
        var ruta   = $(this).data('ruta');
        var id  = $(this).data('id');
        var nom  = $(this).data('nom');
        $('.modal-body #id').val(id);
        $(".modal-body #nom").text(nom);
        $('.modal-body  #formResetuser').attr('action',ruta);
      });

      $(document).on("click", ".blockUser", function() {
        var ruta   = $(this).data('ruta');
        var id  = $(this).data('id');
        var nom  = $(this).data('nom');
        $('.modal-body #id').val(id);
        $(".modal-body #nom").text(nom);
        $('.modal-body  #formblockuser').attr('action',ruta);
      });

      $(document).on("click", ".deleteUser", function () {
        var ruta   = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").text(name);
        $('.modal-footer #formDeleteUser').attr('action', ruta);
      });

      $(document).on("click", ".editeUser", function () {
        var ruta = $(this).data('ruta');
        var rut = $(this).data('rut');
        var name = $(this).data('name');
        var email = $(this).data('email');
        var phone = $(this).data('phone');
        var id = $(this).data('id');
        $(".modal-body #rut").val(rut);
        $(".modal-body #name").val(name);
        $(".modal-body #email").val(email);
        $(".modal-body #phone").val(phone);
        $('.modal-body #id').val(id);
        $('.modal-body #formEdituser').attr('action', ruta);
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
                    <h4 class="title">Manejador Administradores</h4>
                    <p class="category">Lista de Administradores</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href=""  data-ruta="<?php echo e(url('config/admins/add/')); ?>" class="btn btn-primary btn-sm createUser" data-toggle="modal" data-target="#createUser" title="Add">   <i class="fa fa-plus"></i>
                              Agregar
                          </a>
                    </div>

                        <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Correo</th>
                                    <th>Telefono</th>
                                    <th>Fecha Creación</th>
                                    <th>Estado</th>
                                    <th>Opción</th>
                                    </tr>
                                </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $QryUserAdm; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $UsrAdm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                          <td><?php echo e($UsrAdm->rut); ?></td> 
                                          <td><?php echo e($UsrAdm->name); ?></td>  
                                          <td><?php echo e($UsrAdm->email); ?></td>
                                          <td><?php echo e($UsrAdm->phone); ?></td>  
                                         
                                          <td><?php echo e($UsrAdm->created_at); ?></td>  
                                          <td>
                                            <span class="
                                             <?php if($UsrAdm->active == 1): ?> label label-success
                                             <?php elseif($UsrAdm->active == 0): ?> label label-danger
                                             <?php endif; ?> ">
                                            </span> 
                                          </td>  
                                          <td>
                                              
                                         <a href="" data-id="<?php echo e($UsrAdm->id); ?>" data-nom="<?php echo e($UsrAdm->name); ?>" data-ruta="<?php echo e(url('config/users/reset/'.$UsrAdm->id)); ?>" class="btn btn-warning btn-xs resetPass" data-toggle="modal" data-target="#resetPass" title="Reset">  
                                            <i class="fa fa-key"></i>
                                          </a> 

                                         <a href="" data-id="<?php echo e($UsrAdm->id); ?>" data-nom="<?php echo e($UsrAdm->name); ?>" data-ruta="<?php echo e(url('config/users/block/'.$UsrAdm->id)); ?>" class="btn btn-danger btn-xs blockUser" data-toggle="modal" data-target="#blockUser" title="Block">  
                                            <i class="fa fa-lock"></i>
                                         </a> 
                                         
                                         <a href="" data-ruta="<?php echo e(url('config/users/update/'.$UsrAdm->id)); ?>" data-id="<?php echo e($UsrAdm->id); ?>" data-rut="<?php echo e($UsrAdm->rut); ?>" data-name="<?php echo e($UsrAdm->name); ?>" data-email="<?php echo e($UsrAdm->email); ?>" data-phone="<?php echo e($UsrAdm->phone); ?>" data-toggle="modal" data-target="#editeUser" class="btn btn-info btn-xs editeUser" title="Editar">
                                            <i class="fa fa-pencil"></i>
                                         </a>

                                          <a  href="" data-id="<?php echo e($UsrAdm->id); ?>" data-name="<?php echo e($UsrAdm->name); ?>" data-ruta="<?php echo e(url('config/users/delete/'.$UsrAdm->id)); ?>" data-toggle="modal" data-target="#deleteUser"  class="btn btn-xs btn-danger deleteUser">
                                          <i class="fa fa-trash"></i>
                                         </a>

                                          </td>  
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>   
                        </table>    
                    </div>                    
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('configuracion.user.partial.modaladdadm', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('configuracion.user.partial.modalblock', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('configuracion.user.partial.modalreset', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('configuracion.user.partial.modaledit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('configuracion.user.partial.modaldeleteuser', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    
  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>