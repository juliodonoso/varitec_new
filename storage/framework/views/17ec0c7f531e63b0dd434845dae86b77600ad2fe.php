<?php $__env->startSection('content'); ?>

 <?php $__env->startPush('js'); ?> 
<script>
      $(document).on("click", ".createcli", function() {
        var ruta   = $(this).data('ruta');
        $('.modal-body  #formCeateCli').attr('action',ruta);
      });

      $(document).on("click", ".blockcli", function() {
        var ruta   = $(this).data('ruta');
        var id  = $(this).data('id');
        var nom  = $(this).data('nom');
        $('.modal-body #id').val(id);
        $(".modal-body #nom").text(nom);
        $('.modal-body  #formblockCli').attr('action',ruta);
      });      

      $(document).on("click", ".deletecli", function () {
        var ruta   = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").text(name);
        $('.modal-footer #formDeletecli').attr('action', ruta);
      });

      $(document).on("click", ".editcli", function () {
        var ruta = $(this).data('ruta');
        var rut = $(this).data('rut');
        var name = $(this).data('name');
        var dir = $(this).data('dir'); 
        var com = $(this).data('com');
        var ciu = $(this).data('ciu'); 
        var tlf = $(this).data('tlf'); 
        var mai = $(this).data('mai'); 
        var id = $(this).data('id');
        $(".modal-body #rut").val(rut);
        $(".modal-body #name").val(name);
        $(".modal-body #dir").val(dir);
        $(".modal-body #com").val(com);
        $(".modal-body #ciu").val(ciu);
        $(".modal-body #tlf").val(tlf);
        $(".modal-body #mai").val(mai);
        $('.modal-body #id').val(id);
        $('.modal-body #formEditCli').attr('action', ruta);
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
                    <h4 class="title">Clientes</h4>
                    <p class="category">Lista de Clientes</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href=""  data-ruta="<?php echo e(url('Clientes/')); ?>" class="btn btn-primary btn-sm createcli" data-toggle="modal" data-target="#createcli" title="Add">   <i class="fa fa-plus"></i>
                              Registrar
                          </a>
                    </div>

                        <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Rut</th>
                                    <th>Nombre</th>
                                    <th>Direccion</th>
                                    <th>Comuna</th>
                                    <th>Ciudad</th>
                                    <th>Tlf</th>
                                    <th>Mail</th>    
                                    <th>Estado</th>                                
                                    <th>Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $__currentLoopData = $qryCli; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cli): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <td><?php echo e($cli->clRut); ?></td> 
                                      <td><?php echo e($cli->clNombre); ?></td> 
                                      <td><?php echo e($cli->clDireccion); ?></td> 
                                      <td><?php echo e($cli->clComuna); ?></td>
                                      <td><?php echo e($cli->clCiudad); ?></td> 
                                      <td><?php echo e($cli->clTelefono); ?></td>                                          
                                      <td><?php echo e($cli->clEmail); ?></td> 
                                      <td>
                                            <span class="
                                             <?php if($cli->clEstado == 1): ?> label label-success
                                             <?php elseif($cli->clEstado == 0): ?> label label-danger
                                             <?php endif; ?> ">
                                            </span> 
                                      </td>

                                      <td>

                                       <a href="" data-id="<?php echo e($cli->id); ?>" data-nom="<?php echo e($cli->clNombre); ?>" data-ruta="<?php echo e(url('Clientes/block/'.$cli->id)); ?>" class="btn btn-danger btn-xs blockcli" data-toggle="modal" data-target="#blockcli" title="Block">  
                                          <i class="fa fa-lock"></i>
                                       </a> 

                                       <a href="" data-ruta="<?php echo e(url('Clientes/'.$cli->id)); ?>" data-id="<?php echo e($cli->id); ?>" data-rut="<?php echo e($cli->clRut); ?>" data-name="<?php echo e($cli->clNombre); ?>" data-dir="<?php echo e($cli->clDireccion); ?>" data-com="<?php echo e($cli->clComuna); ?>" data-ciu="<?php echo e($cli->clCiudad); ?>" data-tlf="<?php echo e($cli->clTelefono); ?>" data-mai="<?php echo e($cli->clEmail); ?>"  data-toggle="modal" data-target="#editcli" class="btn btn-info btn-xs editcli" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                       </a>

                                        <a  href="" data-ruta="<?php echo e(url('Clientes/'.$cli->id)); ?>" data-id="<?php echo e($cli->id); ?>" data-name="<?php echo e($cli->clNombre); ?>" data-toggle="modal" data-target="#deletecli"  class="btn btn-xs btn-danger deletecli" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                        </a>
                                        
                                      </td>  

                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                </tbody>   
                        </table>    
                       <div class="text-center">
                        <?php echo $qryCli->render(); ?>

                       </div>                             
                    </div>                    
                </div>
            </div>
        </div>
    </div>

    <?php echo $__env->make('clientes.partial.modaladd', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('clientes.partial.modalblock', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('clientes.partial.modaldelete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('clientes.partial.modaledit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>