<?php $__env->startSection('content'); ?>

 <?php $__env->startPush('js'); ?>
<script src="<?php echo e(URL::asset('js/jquery.Rut.js')); ?>" type="text/javascript"></script>

<script type="text/javascript">


function _asignar(id){
 var csrf = $('input[name="_token"]').attr('value');
console.log(csrf)
  var data={
    csrf
  }

   swal({
      title: "Asignar",
      text: "Desea enviar a laboratorio?",
      icon: "warning",
      buttons: [
        'No',
        'Si'
      ],
      dangerMode: true,
    }).then(function(isConfirm) {
      if (isConfirm) {
        $.ajax({
            url: "<?php echo e(asset('Laboratorio/traspaso')); ?>/"+id,
            type: 'GET',
            data,
            dataType: 'json',
            success: function( data ) {
              swal({
                  title: 'Recepcion asignada a Laboratorio!',
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
  <?php echo e(csrf_field()); ?>

  <div class="container-fluid" ng-init="getConsultaUsers(1); setRolUser(1)">
    <div class="row">
      <?php echo $__env->make('include.mensajes', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="green">
                    <h4 class="title">Laboratorio</h4>
                    <p class="category">Traspaso recepción a laboratorio</p>
                </div>
                <div class="card-content">
                    <div class="col-md-12 ">
                         <a href="<?php echo e(asset('/Laboratorio/listarLaboratorio')); ?>"  class="btn btn-primary btn-sm"  title="Add">   <i class=" fa fa-sign-in"></i>
                              Laboratorio
                          </a>
                          <a href="<?php echo e(asset('/Laboratorio/laboratorioListar/2')); ?>"  class="btn btn-success btn-sm"  title="Add">   <i class="fa fa-plus-square"></i>
                              Terminadas
                          </a>

                          <a href="<?php echo e(asset('/Laboratorio/laboratorioListar/1')); ?>"  class="btn btn-secondary btn-sm"  title="Add">   <i class="fa fa-plus-square"></i>
                              Borrador
                          </a>

                    </div>
                       <table class="table table-hover table-condensed">
                                <thead>
                                    <tr>
                                    <th>Numero Recepción</th>
                                    <th>Cliente</th>
                                    <th>Codigo</th>
                                    <th>Equipo</th>
                                    <th>tipo de trabajo</th>
                                    <th>Traspaso Laboratorio</th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $__currentLoopData = $recepcion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                      <td><?php echo e($reg->numeroRecepcion); ?></td>
                                      <td><?php echo e($reg->clNombre); ?></td>
                                      <td><?php echo e($reg->prBarcode); ?></td>
                                      <td><?php echo e($reg->prNombre); ?></td>
                                      <td><?php echo e($reg->tipoTrabajo); ?></td>
                                      <td>
                                        <a href="javascript: _asignar(<?php echo e($reg->id); ?>)"  class="btn btn-success btn-xs editereg" title="Traspaso">
                                          <i class="fa fa-check-square-o"></i>
                                       </a>

                                        <a href="<?php echo e(route('pdfview',['download'=>'pdf','id'=> $reg->id])); ?>"  class="btn btn-error btn-xs editereg" title="Ver">
                                          <i class="fa fa-eye"></i>
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