<?php $__env->startSection('content'); ?>

 <?php $__env->startPush('js'); ?>

<script type="text/javascript">
  function agregarSuminitro(name,id){
    swal({
      text: "Agregar Suminitro "+name,
      buttons: {
        cancel: true,
        confirm: true,
      },
      content: {
        element: "input",
        attributes: {
          placeholder: "Ingrese Cantidad",
          type: "number",
          maxlength: 3
        }
      }
    })
    .then(function(isConfirm) {
      if (isConfirm) {
        console.log( '<?php echo csrf_token(); ?>')
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
            },
          method: "patch",
          url: "suministros/"+id,
          data: { cantidad: isConfirm }
        })
          .done(function( msg ) {
            if(!msg){
              swal({text:'Error al agregar suminitros a bodega'})
            }
          });
      } else {
        return false;
      }
    }).then(()=>{
      swal({text:'Se agregaron suminitros al stock'})
      .then(()=>{
        location.reload();
      })
      
      });

  }


</script>
<?php $__env->stopPush(); ?>


  <?php echo e(csrf_field()); ?>

  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
      <?php echo $__env->make('include.mensajes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Suminstros</h4>
                    <p class="category">Stock </p>
                </div>
                <div class="card-content">
                    <div class="col-md-12 ">
                        <a href="<?php echo e(route('suministros.index')); ?>"  class="btn btn-success btn-sm"  title="Stock">   
                            <i class="fa fa-list-alt"></i>
                            Stock
                          </a>
                         <a href="<?php echo e(route('suministros.solicitud')); ?>"  class="btn btn-primary btn-sm"  title="Solicitud">   
                             <i class=" fa fa-sign-in"></i>
                             Solicitudes
                          </a>
                          <a href="<?php echo e(route('suministros.add')); ?>"  class="btn btn-info btn-sm"  title="Agregar">   
                            <i class=" fa fa-sign-in"></i>
                            Agregar
                         </a>
                    </div>
                       <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th><strong>Suminitro</strong></th>
                                    <th><strong>Cantidad</strong></th>
                                    <th><strong>Agregar</strong></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php $__currentLoopData = $suminitros; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <td><?php echo e($rs->prNombre); ?></td>
                                      <td><?php echo e($rs->prUnidad); ?></td>
                                      
                                      <td> 
                                        <a href="javascript: agregarSuminitro('<?php echo e($rs->prNombre); ?>','<?php echo e($rs->id); ?>')" name="<?php echo e($rs->prNombre); ?>"  class="btn btn-success btn-xs editereg" title="Agregar">
                                          <i class="fa fa-check-square-o"></i>
                                       </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                                <?php echo e($suminitros->links()); ?>

                      </table>
                                            
                    </div>                    
                </div>
            </div>
        </div>
    </div>





<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>