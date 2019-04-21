<?php $__env->startSection('content'); ?>

<?php $__env->startPush('js'); ?>
<script src="<?php echo e(URL::asset('js/jquery.Rut.js')); ?>" type="text/javascript"></script>

<script type="text/javascript">
function _anular(id){
  var csrf = $('meta[name="csrf-token"]').attr('content');
   swal({
      title: "Anular Recepción",
      text: "Desea anular la recepción?",
      icon: "warning",
      buttons: [
        'No',
        'Si'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        console.log('confimacion')
        $.ajax({
            url: "<?php echo e(asset('Recepcion/anular')); ?>/"+id,
            type: 'GET',
            data: { '_token': csrf},
            dataType: 'json',
            success: function( data ) {
              swal({
                  title: 'Recepción Anulada!',
                  icon: 'success',
                  timer: 1000
                }).then(function() {
                      location.reload();
                });
            }
        })

      } 
    })  
}


</script>
<?php $__env->stopPush(); ?>
<div class="content" >
  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
      <?php echo $__env->make('include.mensajes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Recepción</h4>
                    <p class="category">Lista de Recepcion de Equipos</p>
                </div>
                <div class="card-content">
                    <div class="col-md-10 ">
                         <a href="Recepcion/create"  class="btn btn-primary btn-sm"  title="Add">   <i class="fa fa-plus"></i>
                              Registrar
                          </a>
                    </div>

                       <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Numero Recepción</th>
                                    <th>Cliente</th>
                                    <th>Rut</th>
                                    <th>Producto</th>
                                    <th>Fecha Recepción</th>
                                    <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $__currentLoopData = $recepcion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <td><?php echo e($reg->numeroRecepcion); ?></td>
                                      <td><?php echo e($reg->clNombre); ?></td>
                                      <td><?php echo e($reg->clRut); ?></td>
                                      <td><?php echo e($reg->idProducto); ?></td>
                                      <td><?php echo e($reg->fechaRecepcion); ?></td>
                                      <td> 
                                        <a href="<?php echo e(route('pdfview',['download'=>'pdf','id'=> $reg->id])); ?>"  class="btn btn-success btn-xs editereg" title="Ver">
                                          <i class="fa fa-eye"></i>
                                       </a>

                                        <a href="javascript:_anular(<?php echo e($reg->id); ?>)"  class="btn btn-error btn-xs editereg" title="Anular">
                                          <i class="fa fa-ban"></i>
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


  </div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.backend.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>