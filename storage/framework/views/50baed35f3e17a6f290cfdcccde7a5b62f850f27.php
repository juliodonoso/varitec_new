<?php $__env->startSection('content'); ?>

 <?php $__env->startPush('js'); ?> 
<script>
      $(document).on("click", ".createpro", function() {
        var ruta   = $(this).data('ruta');
        $('.modal-body  #formCeatePro').attr('action',ruta);
      });

      $(document).on("click", ".blockpro", function() {
        var ruta   = $(this).data('ruta');
        var id  = $(this).data('id');
        var nom  = $(this).data('nom');
        $('.modal-body #id').val(id);
        $(".modal-body #nom").text(nom);
        $('.modal-body  #formblockPro').attr('action',ruta);
      });            

      $(document).on("click", ".deletepro", function () {
        var ruta   = $(this).data('ruta');
        var name = $(this).data('name');
        var id = $(this).data('id');
        $(".modal-body #name").text(name);
        $('.modal-footer #formDeletePro').attr('action', ruta);
      });

      $(document).on("click", ".editpro", function () {
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
        $('.modal-body #formEditPro').attr('action', ruta);
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
                    <h4 class="title">Proveedores</h4>
                    <p class="category">Lista de Proveedores</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href=""  data-ruta="<?php echo e(url('Proveedores/')); ?>" class="btn btn-primary btn-sm createpro" data-toggle="modal" data-target="#createpro" title="Add">   <i class="fa fa-plus"></i>
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
                                  <?php $__currentLoopData = $qryPro; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                                    <tr>
                                      <td><?php echo e($pro->pvrut); ?></td> 
                                      <td><?php echo e($pro->pvnombre); ?></td> 
                                      <td><?php echo e($pro->pvdireccion); ?></td> 
                                      <td><?php echo e($pro->pvcomuna); ?></td>
                                      <td><?php echo e($pro->pvciudad); ?></td>  
                                      <td><?php echo e($pro->pvtelefono); ?></td>
                                      <td><?php echo e($pro->pvemail); ?></td>
                                      <td>
                                            <span class="
                                             <?php if($pro->pvestado == 1): ?> label label-success
                                             <?php elseif($pro->pvestado == 0): ?> label label-danger
                                             <?php endif; ?> ">
                                            </span> 
                                      </td>
                                      <td>

                                       <a href="" data-id="<?php echo e($pro->id); ?>" data-nom="<?php echo e($pro->pvnombre); ?>" data-ruta="<?php echo e(url('Proveedores/block/'.$pro->id)); ?>" class="btn btn-danger btn-xs blockpro" data-toggle="modal" data-target="#blockpro" title="Block">  
                                          <i class="fa fa-lock"></i>
                                       </a> 

                                       <a href="" data-ruta="<?php echo e(url('Proveedores/'.$pro->id)); ?>" data-id="<?php echo e($pro->id); ?>" data-rut="<?php echo e($pro->pvrut); ?>" data-name="<?php echo e($pro->pvnombre); ?>" data-dir="<?php echo e($pro->pvdireccion); ?>" data-com="<?php echo e($pro->pvcomuna); ?>" data-ciu="<?php echo e($pro->pvciudad); ?>" data-tlf="<?php echo e($pro->pvtelefono); ?>" data-mai="<?php echo e($pro->pvemail); ?>"  data-toggle="modal" data-target="#editpro" class="btn btn-info btn-xs editpro" title="Editar">
                                          <i class="fa fa-pencil"></i>
                                       </a>

                                        <a  href="" data-ruta="<?php echo e(url('Proveedores/'.$pro->id)); ?>" data-id="<?php echo e($pro->id); ?>" data-name="<?php echo e($pro->pvnombre); ?>" data-toggle="modal" data-target="#deletepro"  class="btn btn-xs btn-danger deletepro" title="Eliminar">
                                        <i class="fa fa-trash"></i>
                                        </a>
                                        
                                      </td>  

                                    </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>   
                        </table>
                       <div class="text-center">
                        <?php echo $qryPro->render(); ?>

                       </div>                           
                    </div>                    
                </div>
            </div>
        </div>
    </div>
     <?php echo $__env->make('proveedores.partial.modaladd', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->make('proveedores.partial.modalblock', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->make('proveedores.partial.modaldelete', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
     <?php echo $__env->make('proveedores.partial.modaledit', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

  </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>